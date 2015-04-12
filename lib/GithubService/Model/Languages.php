<?php


namespace GithubService\Model;



class Languages implements \IteratorAggregate {

    use DataMapper;
    
    public $languageBytes;
    
    static protected $dataMap = array(
        ['languageBytes', [], 'multiple' => true, 'preserveKeys' => true],
    );

    /**
     * @return string[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->languageBytes);
    }
}

 