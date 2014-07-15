<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;



class Commits {

    use DataMapper;

    /**
     * @var \GithubService\Model\Commit[]
     */
    public $commits = [];

    static protected $dataMap = array(
        ['commits', [], 'class' => 'GithubService\Model\Commit', 'multiple' => true],
    );

    /**
     * @return \GithubService\Model\Commit[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->commits);
    }
}