<?php 

namespace GithubService\Model;

class UserSearchResults extends \GithubService\Model\DataMapper {

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
