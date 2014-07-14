<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;


class RepoTags implements \IteratorAggregate {

    use DataMapper;

    /** @var  \GithubService\Model\RepoTag[] */
    public $repoTags;
    

    static protected $dataMap = array(
        ['repoTags', [], 'class' => 'GithubService\Model\RepoTag', 'multiple' => true],
    );


    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }

    /**
     * @return \GithubService\Model\RepoTag[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->repoTags);
    }
}

 