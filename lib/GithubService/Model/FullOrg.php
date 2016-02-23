<?php 

namespace GithubService\Model;

class FullOrg
{
    public $avatarUrl = null;

    public $blog = null;

    public $company = null;

    public $createdAt = null;

    public $description = null;

    public $email = null;

    public $followers = null;

    public $following = null;

    public $htmlUrl = null;

    public $id = null;

    public $location = null;

    public $login = null;

    public $name = null;

    public $publicGists = null;

    public $publicRepos = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['blog', 'blog'],
            ['company', 'company'],
            ['createdAt', 'created_at'],
            ['description', 'description'],
            ['email', 'email'],
            ['followers', 'followers'],
            ['following', 'following'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['location', 'location'],
            ['login', 'login'],
            ['name', 'name'],
            ['publicGists', 'public_gists'],
            ['publicRepos', 'public_repos'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
