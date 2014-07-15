<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;


class Commit {
    
    use DataMapper;

    public $url;
    public $sha;
    public $htmlURL;

    /**
     * @var \GithubService\Model\CommitInfo
     */
    public $commitInfo;

    /**
     * Author can be null when Github doesn't know who they are
     * @var \GithubService\Model\Person|null
     */
    public $author;
    
    /**
     * Committer can be null when Github doesn't know who they are
     * @var \GithubService\Model\Person|null
     */
    public $committer;

    /**
     * @var \GithubService\Model\CommitParent[]
     */
    public $parents;

    static protected $dataMap = array(
        ['url', 'url'],
        ['sha', 'sha'],
        ['htmlURL', 'html_url'],
        ['commitInfo', 'commit', 'class' => 'GithubService\Model\CommitInfo'],
        ['author', 'author', 'class' => 'GithubService\Model\Person'],
        ['committer', 'committer', 'class' => 'GithubService\Model\Person'],
        ['parents', 'parents', 'class' => 'GithubService\Model\CommitParent', 'multiple' => 'true'],
    );
}

 