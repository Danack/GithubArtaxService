<?php


namespace GithubService\Model;


class Tags implements \IteratorAggregate
{
    use GithubTrait;
    
    /** @var  \GithubService\Model\Tag[] */
    public $repoTags = [];

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
            $string .= $repoTag->name;
            $separator = ', ';
        }

        return $string;
    }
}

 