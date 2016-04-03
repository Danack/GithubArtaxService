<?php 

namespace GithubService\Model;

class OwnerSearch
{
    use GithubTrait;
    use SafeAccess;

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
    public $subscriptionsURL;
    public $organizationsURL;
    public $reposURL;
    public $eventsURL;
    public $receivedEventsURL;
    public $type;
    public $siteAdmin;

}
