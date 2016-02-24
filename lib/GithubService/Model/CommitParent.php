<?php

namespace GithubService\Model;

class CommitParent
{
    use GithubTrait;
    use SafeAccess;
    
    public $url;
    public $sha;
}
 