<?php 

namespace GithubService\Model;

class Deployment
{
    public $createdAt = null;

    /**
     * @var \GithubService\Model\User $creator
     */
    public $creator = null;

    public $description = null;

    public $environment = null;

    public $id = null;

    /**
     * @var \GithubService\Model\Payload $payload
     */
    public $payload = null;

    public $ref = null;

    public $sha = null;

    public $statusesUrl = null;

    public $task = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['creator', 'creator', 'class' => 'GithubService\\Model\\User'],
            ['description', 'description'],
            ['environment', 'environment'],
            ['id', 'id'],
            ['payload', 'payload', 'class' => 'GithubService\\Model\\Payload'],
            ['ref', 'ref'],
            ['sha', 'sha'],
            ['statusesUrl', 'statuses_url'],
            ['task', 'task'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
