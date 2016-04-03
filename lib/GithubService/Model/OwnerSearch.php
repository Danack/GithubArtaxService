<?php 

namespace GithubService\Model;

class OwnerSearch
{
    use GithubTrait;
    use SafeAccess;

    // It is unclear what fields will be available here.
    // I have erred on the side of safety, to have the minimal amount.
    public $login;
    public $id;
    public $avatarURL;
    public $gravatarID;
    public $url;
    public $htmlUrl;
    //public $followersUrl;
    //public $followingUrl;
    //public $gistsUrl;
    //public $starredUrl;
    //public $subscriptionsURL;
    //public $organizationsURL;
    //public $reposURL;
    //public $eventsURL;
    public $receivedEventsURL;
    public $type;
    //public $siteAdmin;
}
