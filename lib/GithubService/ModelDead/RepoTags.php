<?php


namespace GithubService\Model;


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


    function __toString() {
        
        $string = '';

        $separator = '';
        
        foreach ($this->repoTags as $repoTag) {
            $string .= $separator;
            $string .= $repoTag;
            $separator = ', ';
        }
        
        return $string;
    }


}

 