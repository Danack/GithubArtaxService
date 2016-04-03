<?php 

namespace GithubService\Model;

class CommitList implements \IteratorAggregate
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\Commit $commitsChild
     */
    public $commitsChild = [];
    
    public function getIterator()
    {
        return new \ArrayIterator($this->commitsChild);
    }
}
