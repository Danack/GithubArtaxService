<?php 

namespace GithubService\Model;

class Team extends \GithubService\Model\DataMapper {

    public $description = null;

    public $id = null;

    public $membersUrl = null;

    public $name = null;

    public $permission = null;

    public $repositoriesUrl = null;

    public $slug = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['description', 'description'],
            ['id', 'id'],
            ['membersUrl', 'members_url'],
            ['name', 'name'],
            ['permission', 'permission'],
            ['repositoriesUrl', 'repositories_url'],
            ['slug', 'slug'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
