<?php 

namespace GithubService\Model;

class SearchRepoItem
{
    use GithubTrait;
    use SafeAccess;
    
    public $created = null;

    public $createdAt = null;

    public $description = null;

    public $followers = null;

    public $fork = null;

    public $forksCount = null;

    //public $hasDownloads = null;

//    public $hasIssues = null;

    //public $hasWiki = null;

    public $homepage = null;

    public $language = null;

    public $name = null;

    //public $openIssues = null;

    /** @var OwnerSearch */
    public $owner = null;

    public $private = null;

//    public $pushed = null;

    public $pushedAt = null;

    public $score = null;

    public $size = null;

//    public $type = null;

    public $url = null;

    public $username = null;

    public $stargazersCount;
    
    public $watchersCount;    
}
