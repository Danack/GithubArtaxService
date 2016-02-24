<?php 

namespace GithubService\Model;

class TreeChild
{
    use GithubTrait;
    use SafeAccess;
    
    public $mode = null;

    public $path = null;

    public $sha = null;

    public $size = null;

    public $type = null;

    public $url = null;
}
