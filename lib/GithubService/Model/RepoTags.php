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

    /**
     * @return \GithubService\Model\RepoTag[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->repoTags);
    }
}

 