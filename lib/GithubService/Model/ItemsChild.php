<?php 

namespace GithubService\Model;

class ItemsChild
{
    public $avatarUrl = null;

    public $followersUrl = null;

    public $gravatarId = null;

    public $htmlUrl = null;

    public $id = null;

    public $login = null;

    public $organizationsUrl = null;

    public $receivedEventsUrl = null;

    public $reposUrl = null;

    public $score = null;

    public $subscriptionsUrl = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['followersUrl', 'followers_url'],
            ['gravatarId', 'gravatar_id'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['login', 'login'],
            ['organizationsUrl', 'organizations_url'],
            ['receivedEventsUrl', 'received_events_url'],
            ['reposUrl', 'repos_url'],
            ['score', 'score'],
            ['subscriptionsUrl', 'subscriptions_url'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }

}
