<?php


namespace GithubService\Model;


class Person extends DataMapper{


    public $login;
    public $id;
    public $avatarURL;
    public $gravatarID;
    public $url;
    public $followersURL;
    public $followingURL;
    public $gistsURL;
    public $starredURL;
    public $organizationsURL;
    public $reposURL;
    public $eventsURL;
    public $receivedEventsURL;
    public $type;
    public $siteAdmin;


    protected function getDataMap() {
        $dataMap = array(
            ['login', 'login'],
            ['id', 'id'],
            ['avatarURL', 'avatar_url'],
            ['gravatarID', 'gravatar_id'],
            ['url', 'url'],
            ['followersURL', 'followers_url', 'optional' => true],
            ['followingURL', 'following_url', 'optional' => true],
            ['gistsURL', 'gists_url', 'optional' => true],
            ['starredURL', 'starred_url', 'optional' => true],
            ['organizationsURL', 'organizations_url', 'optional' => true],
            ['reposURL', 'repos_url', 'optional' => true],
            ['eventsURL', 'events_url', 'optional' => true],
            ['receivedEventsURL', 'received_events_url', 'optional' => true],
            ['type', 'type', 'optional' => true],
            ['siteAdmin', 'site_admin', 'optional' => true],
        );

        return $dataMap;
    }
    

//"author": {
//"login": "octocat",
//"id": 1,
//"avatar_url": "https://github.com/images/error/octocat_happy.gif",
//"gravatar_id": "somehexcode",
//"url": "https://api.github.com/users/octocat",
//"html_url": "https://github.com/octocat",
//"followers_url": "https://api.github.com/users/octocat/followers",
//"following_url": "https://api.github.com/users/octocat/following{/other_user}",
//"gists_url": "https://api.github.com/users/octocat/gists{/gist_id}",
//"starred_url": "https://api.github.com/users/octocat/starred{/owner}{/repo}",
//"subscriptions_url": "https://api.github.com/users/octocat/subscriptions",
//"organizations_url": "https://api.github.com/users/octocat/orgs",
//"repos_url": "https://api.github.com/users/octocat/repos",
//"events_url": "https://api.github.com/users/octocat/events{/privacy}",
//"received_events_url": "https://api.github.com/users/octocat/received_events",
//"type": "User",
//"site_admin": false
//},
    
}

 