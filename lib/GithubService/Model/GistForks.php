<?php 

namespace GithubService\Model;

class GistForks
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\GistFork[]
     */
    public $gistForklist = [];
}
