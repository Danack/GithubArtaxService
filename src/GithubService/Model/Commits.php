<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;



class Commits {

    use DataMapper;

    /**
     * @var \GithubService\Model\Commit[]
     */
    public $commits = [];

    static protected $dataMap = array(
        ['commits', [], 'class' => 'GithubService\Model\Commit', 'multiple' => true],
    );


    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }

    /**
     * @return \GithubService\Model\Commit[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->commits);
    }
}