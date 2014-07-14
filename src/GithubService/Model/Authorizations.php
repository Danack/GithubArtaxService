<?php


namespace GithubService\Model;

use Artax\Response;
use ArtaxServiceBuilder\Operation;

class Authorizations implements \IteratorAggregate  {

    use DataMapper;

    /** @var  \GithubService\Model\Authorization[] */
    public $authorizations = [];
    
    static protected $dataMap = array(
        ['authorizations', [], 'class' => 'GithubService\Model\Authorization', 'multiple' => true],
    );

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }

    /**
     * @return \GithubService\Model\Authorization[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->authorizations);
    }
}

 