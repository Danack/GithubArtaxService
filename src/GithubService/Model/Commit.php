<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;
use AABTest\DataMapper;


class Commit {
    
    use DataMapper;

    public $url;
    public $sha;
    public $htmlURL;

    /**
     * @var \AABTest\Github\CommitInfo
     */
    public $commitInfo;

    /**
     * Author can be null when Github doesn't know who they are
     * @var \AABTest\Github\Person|null
     */
    public $author;
    
    /**
     * Committer can be null when Github doesn't know who they are
     * @var \AABTest\Github\Person|null
     */
    public $committer;

    /**
     * @var \AABTest\Github\CommitParent[]
     */
    public $parents;

    static protected $dataMap = array(
        ['url', 'url'],
        ['sha', 'sha'],
        ['htmlURL', 'html_url'],
        ['commitInfo', 'commit', 'class' => 'AABTest\Github\CommitInfo'],
        ['author', 'author', 'class' => 'AABTest\Github\Person'],
        ['committer', 'committer', 'class' => 'AABTest\Github\Person'],
        ['parents', 'parents', 'class' => 'AABTest\Github\CommitParent', 'multiple' => 'true'],
    );


    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }


}

 