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

    /**
     * @return \GithubService\Model\Authorization[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->authorizations);
    }
}

 