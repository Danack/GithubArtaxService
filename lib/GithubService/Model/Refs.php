<?php 

namespace GithubService\Model;

class Refs
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Ref $rEFSChild
     */
    public $refs = array();
}
