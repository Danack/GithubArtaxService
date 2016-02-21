<?php 

namespace GithubService\Model;

class CommitList
{
    use GithubTrait;

    /**
     * @var \GithubService\Model\Commit $commitsChild
     */
    public $commitsChild = array(  
    );
}
