<?php 

namespace GithubService\Model;

class UserSearchResults
{
    /**
     * @var \GithubService\Model\ $users
     */
    public $users = [];

    protected function getDataMap() {
        $dataMap = [
            ['users', 'users', 'class' => 'GithubService\\Model\\UserSearchItem', 'multiple' => true],
        ];

        return $dataMap;
    }
}
