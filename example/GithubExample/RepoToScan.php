<?php


namespace GithubExample;

class RepoToScan
{
    public $owner;
    public $name;
    public $url;
    
    public function __construct($owner, $name, $url)
    {
        $this->owner  = $owner;
        $this->name = $name;
        $this->url = $url;
    }
}
