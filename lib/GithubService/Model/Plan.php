<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;


class Plan {

    use DataMapper;
    
    public $name;
    public $space;
    public $collaborators;
    public $privateRepos;
    
    static protected $dataMap = array(
       ['name', 'name'],
       ['space', 'space'],
       ['collaborators', 'collaborators'],
       ['privateRepos', 'private_repos'],
    );
}

 