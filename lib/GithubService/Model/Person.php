<?php

namespace GithubService\Model;

class Person 
{
    use GithubTrait;
    use SafeAccess;
    
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
}

 