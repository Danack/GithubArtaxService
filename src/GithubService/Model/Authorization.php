<?php


namespace GithubService\Model;

use Artax\Response;
use ArtaxServiceBuilder\Operation;

class Authorization {

    use DataMapper;
    
    public $id;
    public $url;
    public $scopes;
    public $token;
    
    /** @var  \GithubService\Model\Application */
    public $application;
    
    public $note;
    public $noteURL;
    public $updatedAt;
    public $createdAt;
    
    static protected $dataMap = array(
        ['id', 'id' ],
        ['url', 'url'],
        ['scopes', 'scopes', 'multiple' => true],
        ['token', 'token'],
        ['application', ['app'], 'class' => '\GithubService\Model\Application'],
        ['note', 'note'],
        ['noteURL', 'note_url'],
        ['updatedAt', 'updated_at'],
        ['createdAt', 'created_at']
    );
    

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }
}

 