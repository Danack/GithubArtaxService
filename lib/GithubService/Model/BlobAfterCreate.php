<?php 

namespace GithubService\Model;

class BlobAfterCreate
{
    use GithubTrait;
    use SafeAccess;

    public $sha = null;

    public $url = null;
}
