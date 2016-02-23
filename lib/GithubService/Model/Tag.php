<?php 

namespace GithubService\Model;

class Tag 
{
    /**
     * @var \GithubService\Model\BlobAfterCreate $commit
     */
    public $commit = null;

    public $name = null;

    public $tarballUrl = null;

    public $zipballUrl = null;
}
