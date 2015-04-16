<?php 

namespace GithubService\Model;

class Subscription extends \GithubService\Model\DataMapper {

    public $createdAt = null;

    public $ignored = null;

    public $reason = null;

    public $subscribed = null;

    public $threadUrl = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['ignored', 'ignored'],
            ['reason', 'reason'],
            ['subscribed', 'subscribed'],
            ['threadUrl', 'thread_url'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
