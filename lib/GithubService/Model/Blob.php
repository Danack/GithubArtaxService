<?php 

namespace GithubService\Model;

class Blob
{
    use GithubTrait;
    use SafeAccess;

    public $content = null;

    public $encoding = null;

    public $sha = null;

    public $size = null;

    public $url = null;
}
