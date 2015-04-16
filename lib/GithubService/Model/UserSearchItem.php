<?php 

namespace GithubService\Model;

class UserSearchItem extends \GithubService\Model\DataMapper {

    public $created = null;

    public $createdAt = null;

    public $followers = null;

    public $followersCount = null;

    public $fullname = null;

    public $gravatarId = null;

    public $id = null;

    public $language = null;

    public $location = null;

    public $login = null;

    public $name = null;

    public $publicRepoCount = null;

    public $repos = null;

    public $score = null;

    public $type = null;

    public $username = null;

    protected function getDataMap() {
        $dataMap = [
            ['created', 'created'],
            ['createdAt', 'created_at'],
            ['followers', 'followers'],
            ['followersCount', 'followers_count'],
            ['fullname', 'fullname'],
            ['gravatarId', 'gravatar_id'],
            ['id', 'id'],
            ['language', 'language'],
            ['location', 'location'],
            ['login', 'login'],
            ['name', 'name'],
            ['publicRepoCount', 'public_repo_count'],
            ['repos', 'repos'],
            ['score', 'score'],
            ['type', 'type'],
            ['username', 'username'],
        ];

        return $dataMap;
    }


}
