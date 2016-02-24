<?php 

namespace GithubService\Model;

class Ref
{
    use GithubTrait;
    use SafeAccess;
    
    /** @var \GithubService\Model\RefObject $refObject */
    public $refObject = null;

    public $ref = null;

    public $url = null;

}
