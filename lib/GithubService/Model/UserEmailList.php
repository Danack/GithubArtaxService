<?php 

namespace GithubService\Model;

class UserEmailList implements \IteratorAggregate
{
    use GithubTrait;
    use SafeAccess;

    /** @var \GithubService\Model\UserEmail[] $emails */
    public $emails = [];
    
    public function getIterator()
    {
        return new \ArrayIterator($this->emails);
    }
}
