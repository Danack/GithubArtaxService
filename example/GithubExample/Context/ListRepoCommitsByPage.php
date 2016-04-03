<?php

namespace GithubExample\Context;

class ListRepoCommitsByPage
{
    /** @var \GithubService\Model\Commits[] */
    public $pagedCommits = [];

    public function addCommits($page, $commits)
    {
        $this->pagedCommits[$page] = $commits;
    }
}
