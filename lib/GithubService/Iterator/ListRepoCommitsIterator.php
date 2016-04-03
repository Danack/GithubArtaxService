<?php

namespace GithubService\Iterator;

use GithubService\GithubService;
use GithubService\AuthToken;

class ListRepoCommitsIterator implements \Iterator {

    private $page = 0;

    /**
     * @var \GithubService\Model\Commits
     */
    private $commits = null;

    /**
     * @var  \GithubService\Operation\listRepoCommits
     */
    private $command;

    /**
     * @var \GithubService\AuthToken
     */
    private $oauthToken;

    /**
     * @var bool Flag to prevent anyone re-using this iterator. They should copy the values out...
     * @TODO copy the values inside this iterator?
     */
    private $nextHasBeenCalled;

    function __construct(
        GithubService $api,
        AuthToken $oauthToken,
        \GithubService\Operation\listRepoCommits $listRepoCommits,
        $maxPages = 5
    ) {
        $this->api = $api;
        $this->oauthToken = $oauthToken;
        //Command doesn't get executed until needed.
        $this->command = $listRepoCommits;
        $this->maxPages = $maxPages;
    }

    function rewind() {
        if ($this->nextHasBeenCalled == true) {
            throw new \LogicException("listRepoCommitsIterator is not rewindable");
        }
    }

    function current() {
        $this->commits = $this->command->execute();
        $this->command = null;

        return $this->commits;
    }

    function key() {
        return $this->page;
    }

    function next() {
        $this->nextHasBeenCalled = true;

        if($this->page >= $this->maxPages) {
            return;
        }

        if ($this->commits->pager) {
            if ($this->commits->pager->nextLink) {
                $this->command = $this->api->listRepoCommitsPaginate(
                    $this->oauthToken,
                    $this->commits->pager->nextLink->url
                );
            }
        }

        $this->page++;
    }

    function valid() {
        return ($this->command != null);
    }
}
