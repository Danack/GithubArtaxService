<?php


namespace GithubService\Model;


class Application {

    use DataMapper;
    
    public $url;
    public $name;
    public $clientID;
    
    static protected $dataMap = array(
        ['url', 'url'],
        ['name', 'name'],
        ['clientID', 'client_id'],
    );
}

