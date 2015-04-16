<?php


namespace GithubService\Model;


class Commits extends DataMapper implements \IteratorAggregate{

    /**
     * @var \GithubService\Model\Commit[]
     */
    public $commits = [];

    function getDataMap() {
        $dataMap = array(
            ['commits', [], 'class' => 'GithubService\Model\Commit', 'multiple' => true],
        );

        return $dataMap;
    }

    /**
     * @return \GithubService\Model\Commit[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->commits);
    }
}