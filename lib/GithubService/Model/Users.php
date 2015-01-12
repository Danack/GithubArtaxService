<?php


namespace GithubService\Model;


class Users {

    use DataMapper;

    /**
     * @var \GithubService\Model\Commit[]
     */
    public $users = [];

    static protected $dataMap = array(
        ['users', [], 'class' => 'GithubService\Model\User', 'multiple' => true],
    );

    /**
     * @return \GithubService\Model\Commit[]
     */
    public function getIterator() {
        return new \ArrayIterator($this->users);
    }
}