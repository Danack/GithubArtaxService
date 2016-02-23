<?php 

namespace GithubService\Model;

class StatusesChild
{
    public $context = null;

    public $createdAt = null;

    public $description = null;

    public $id = null;

    public $state = null;

    public $targetUrl = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['context', 'context'],
            ['createdAt', 'created_at'],
            ['description', 'description'],
            ['id', 'id'],
            ['state', 'state'],
            ['targetUrl', 'target_url'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
