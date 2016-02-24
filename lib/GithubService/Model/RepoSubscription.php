<?php 

namespace GithubService\Model;

class RepoSubscription
{
    use GithubTrait;
    use SafeAccess;
    
    public $createdAt = null;

    public $ignored = null;

    public $reason = null;

    public $repositoryUrl = null;

    public $subscribed = null;

    public $url = null;
}
