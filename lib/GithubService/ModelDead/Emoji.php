<?php

namespace GithubService\Model;


class Emoji {

    public $name;
    public $url;

    public function __construct($name, $url) {
        $this->name = $name;
        $this->url = $url;
    }
}
