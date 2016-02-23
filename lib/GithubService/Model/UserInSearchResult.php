<?php 

namespace GithubService\Model;

class UserInSearchResult
{
    public $email;
    public $location;
    public $publicGistCount ;
    public $gravatarId;
    public $type;
    public $login;
    public $blog;
    public $createdAt;
    public $id ;
    public $created;
    public $company;
    public $name;
    public $followingCount ;
    public $followersCount;
    public $publicRepoCount;

    protected function getDataMap() {
        $dataMap = [
            ['email',                'email'],
            ['location',             'location'],
            ['publicGistCount',      'public_gist_count'], 
            ['gravatarId',           'gravatar_id'],
            ['type',                 'type'],
            ['login',                'login'],
            ['blog',                 'blog'],
            ['createdAt',            'created_at'],
            ['id',                   'id'], 
            ['created',              'created'],
            ['company',              'company'],
            ['name',                 'name'],
            ['followingCount',       'following_count'], 
            ['followersCount',       'followers_count'],
            ['publicRepoCount',      'public_repo_count'],        
        ];

        return $dataMap;
    }
}
