<?php 

namespace GithubService\Model;

class RepoSubscription extends \GithubService\Model\DataMapper {

    public $createdAt = null;

    public $ignored = null;

    public $reason = null;

    public $repositoryUrl = null;

    public $subscribed = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['ignored', 'ignored'],
            ['reason', 'reason'],
            ['repositoryUrl', 'repository_url'],
            ['subscribed', 'subscribed'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
