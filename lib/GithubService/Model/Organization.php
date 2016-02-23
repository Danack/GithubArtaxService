<?php 

namespace GithubService\Model;

class Organization
{
    public $avatarUrl = null;

    public $description = null;

    public $id = null;

    public $login = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['description', 'description'],
            ['id', 'id'],
            ['login', 'login'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
