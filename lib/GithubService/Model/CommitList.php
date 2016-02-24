<?php 

namespace GithubService\Model;

class CommitList
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\Commit $commitsChild
     */
    public $commitsChild = [];
}
