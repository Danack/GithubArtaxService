<?php


namespace GithubService\Model;


class RepoBranches implements \IteratorAggregate {

    use DataMapper;

    /** @var  \GithubService\Model\BranchCommit[] */
    private $branches;


    static protected $dataMap = array(
        ['branches', [], 'class' => 'GithubService\Model\BranchCommit', 'multiple' => true],
    );
    

    /**
     * @return \GithubService\Model\RepoTag[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->branches);
    }
}

 