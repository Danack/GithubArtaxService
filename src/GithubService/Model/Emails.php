<?php

namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;

class Emails {

    use DataMapper;

    /** @var  \GithubService\Model\Email[] */
    public $emails;

    static protected $dataMap = array(
        ['emails', [], 'class' => 'GithubService\Model\Email', 'multiple' => true],
    );

    /**
     * @param Response $response
     * @param Operation $operation
     * @return \GithubService\Model\Emails
     * @throws DataMapperException
     */
    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }
}
