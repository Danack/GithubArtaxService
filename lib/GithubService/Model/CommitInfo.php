<?php

namespace GithubService\Model;

class CommitInfo
{
    use GithubTrait;
    use SafeAccess;

    public $url;

    public $authorName;
    public $authorEmail;
    public $authorDate;//why the fuck is this under author?
    
    public $committerName;
    public $committerEmail;
    public $committerDate;
    
    public $message;
    public $treeURL;
    public $treeSHA;
    public $commentCount;
}
 