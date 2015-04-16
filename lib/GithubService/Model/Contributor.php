<?php 

namespace GithubService\Model;

class Contributor extends \GithubService\Model\DataMapper {

    public $avatarUrl = null;

    public $contributions = null;

    public $eventsUrl = null;

    public $followersUrl = null;

    public $followingUrl = null;

    public $gistsUrl = null;

    public $gravatarId = null;

    public $htmlUrl = null;

    public $id = null;

    public $login = null;

    public $organizationsUrl = null;

    public $receivedEventsUrl = null;

    public $reposUrl = null;

    public $siteAdmin = null;

    public $starredUrl = null;

    public $subscriptionsUrl = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['contributions', 'contributions'],
            ['eventsUrl', 'events_url'],
            ['followersUrl', 'followers_url'],
            ['followingUrl', 'following_url'],
            ['gistsUrl', 'gists_url'],
            ['gravatarId', 'gravatar_id'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['login', 'login'],
            ['organizationsUrl', 'organizations_url'],
            ['receivedEventsUrl', 'received_events_url'],
            ['reposUrl', 'repos_url'],
            ['siteAdmin', 'site_admin'],
            ['starredUrl', 'starred_url'],
            ['subscriptionsUrl', 'subscriptions_url'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
