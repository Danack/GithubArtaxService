<?php


namespace GithubService\Model;


class RepoBranches implements \IteratorAggregate {

    use DataMapper;

    /** @var  \GithubService\Model\RepoBranch[] */
    private $branches;

    /**
     * @return \GithubService\Model\RepoTag[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->branches);
    }

}

 