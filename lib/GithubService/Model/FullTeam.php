<?php 

namespace GithubService\Model;

class FullTeam extends \GithubService\Model\DataMapper {

    public $description = null;

    public $id = null;

    public $membersCount = null;

    public $membersUrl = null;

    public $name = null;

    /**
     * @var \GithubService\Model\ $organization
     */
    public $organization = null;

    public $permission = null;

    public $reposCount = null;

    public $repositoriesUrl = null;

    public $slug = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['description', 'description'],
            ['id', 'id'],
            ['membersCount', 'members_count'],
            ['membersUrl', 'members_url'],
            ['name', 'name'],
            ['organization', 'organization', 'class' => 'GithubService\\Model\\Organization'],
            ['permission', 'permission'],
            ['reposCount', 'repos_count'],
            ['repositoriesUrl', 'repositories_url'],
            ['slug', 'slug'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
