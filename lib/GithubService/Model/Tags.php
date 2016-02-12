<?php


namespace GithubService\Model;


class Tags extends \GithubService\Model\DataMapper implements \IteratorAggregate {

    /** @var  \GithubService\Model\RepoTag[] */
    public $repoTags;
    
    protected function getDataMap() {
        $dataMap = array(
            ['repoTags', [], 'class' => 'GithubService\Model\Tag', 'multiple' => true],
        );

        return $dataMap;
    }

    /**
     * @return \GithubService\Model\Tag[]
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

 