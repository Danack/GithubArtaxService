<?php 

namespace GithubService\Model;

class Tag 
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\BlobAfterCreate $commit
     */
    public $commit = null;

    public $name = null;

    public $tarballUrl = null;

    public $zipballUrl = null;
}
