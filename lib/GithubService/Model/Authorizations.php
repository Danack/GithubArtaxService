<?php


namespace GithubService\Model;


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

 