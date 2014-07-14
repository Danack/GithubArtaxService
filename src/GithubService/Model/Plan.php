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

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData['photos']);
    }

}

 