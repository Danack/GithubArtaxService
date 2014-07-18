<?php


namespace GithubService\Model;

use Artax\Response;
use ArtaxServiceBuilder\Operation;

class User {
    
    public $login;
    public $id;
    public $avatarURL;
    public $gravatarID;
    public $url;
    public $htmlUrl;
    public $followersUrl;
    public $followingUrl;
    public $gistsUrl;
    public $starredUrl;
    public $subscriptionsUrl;
    public $organizationsUrl;
    public $reposUrl;
    public $eventsUrl;
    public $receivedEventsUrl;
    public $type;
    public $siteAdmin;
    public $name;
    public $company;
    public $blog;
    public $location;
    public $email;
    public $hireable;
    public $bio;
    public $publicRepos;
    public $publicGists;
    public $followers;
    public $following;
    public $createdAt;
    public $updatedAt;
    
    public $plan;

    //public $oauthScopes = [];
    
    
    use DataMapper;

    static protected $dataMap = array(
        ['login', 'login'],
        ['id', 'id'],
        ['avatarURL', 'avatar_url'],
        ['gravatarID', 'gravatar_id'],
        ['url', 'url'],
        ['htmlUrl', 'html_url'],
        ['followersUrl', 'followers_url'],
        ['followingUrl', 'following_url'],
        ['gistsUrl', 'gists_url'],
        ['starredUrl', 'starred_url'],
        ['subscriptionsUrl', 'subscriptions_url'],
        ['organizationsUrl', 'organizations_url'],
        ['reposUrl', 'repos_url'],
        ['eventsUrl', 'events_url'],
        ['receivedEventsUrl', 'received_events_url'],
        ['type', 'type'],
        ['siteAdmin', 'site_admin'],
        ['name', 'name'],
        ['company', 'company'],
        ['blog', 'blog'],
        ['location', 'location'],
        ['email', 'email'],
        ['hireable', 'hireable'],
        ['bio', 'bio'],
        ['publicRepos', 'public_repos'],
        ['publicGists', 'public_gists'],
        ['followers', 'followers'],
        ['following', 'following'],
        ['createdAt', 'created_at'],
        ['updatedAt', 'updated_at'],
        //['oauthScopes', 'oauthScopes', 'optional' => true],

        //I don't know if this is actually optional, but I doubt it's vital
        //information
        ['plan', 'plan', 'class' => 'GithubService\Model\Plan', 'optional' => true],
    );


//    /**
//     * @param Response $response
//     * @param Operation $operation
//     * @return \GithubService\Model\Emails
//     * @throws DataMapperException
//     */
//    static function createFromResponse(Response $response, Operation $operation) {
//        $data = $response->getBody();
//        $jsonData = json_decode($data, true);
//
//        $oauthHeaderValues = $response->getHeader('X-OAuth-Scopes');
//
//        $oauthScopes = [];
//        
//        foreach ($oauthHeaderValues as $oauthHeaderValue) {
//            $oauthScopes = explode(', ', $oauthHeaderValue);
//        }
//
//        $jsonData['oauthScopes'] = $oauthScopes;
//
//        return self::createFromData($jsonData);
//    }
}

 