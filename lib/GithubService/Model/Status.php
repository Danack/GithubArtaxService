<?php 

namespace GithubService\Model;

class Status
{
    public $context = null;

    public $createdAt = null;

    /**
     * @var \GithubService\Model\User $creator
     */
    public $creator = null;

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
            ['creator', 'creator', 'class' => 'GithubService\\Model\\User', 'optional' => true],
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
