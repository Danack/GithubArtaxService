<?php


namespace GithubService\Model;


class Team {
    
    use DataMapper;

    public $url;
    public $name;
    public $id;

    static protected $dataMap = array(
        ['url', 'url'],
        ['name', 'name'],
        ['id', 'id'],
    );
}

 