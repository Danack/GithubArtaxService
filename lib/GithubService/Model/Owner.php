<?php 

namespace GithubService\Model;

class Owner
{
    use GithubTrait;
    use SafeAccess;
    
    public $avatarUrl = null;

    public $gravatarId = null;

    public $id = null;

    public $login = null;

    public $receivedEventsUrl = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['gravatarId', 'gravatar_id'],
            ['id', 'id'],
            ['login', 'login'],
            ['receivedEventsUrl', 'received_events_url'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
