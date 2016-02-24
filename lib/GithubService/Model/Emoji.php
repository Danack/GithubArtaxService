<?php

namespace GithubService\Model;

class Emoji
{
    use GithubTrait;
    use SafeAccess;
    
    public $name;
    public $url;

    function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }
}
