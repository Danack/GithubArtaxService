<?php


namespace GithubService\Model;


class TextMatches implements \IteratorAggregate {

    use DataMapper;

    public $objectURL;
    public $objectType;
    public $property;
    public $fragment;
    public $matches;

    static protected $dataMap = array(
        [ 'objectURL', "object_url"],
        [ 'objectType', "object_type"],
        [ 'property', "property"],
        [ 'fragment', "fragment"],
        [ 'matches', "matches"],
    );

    /**
     * @return string[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->matches);
    }
}

