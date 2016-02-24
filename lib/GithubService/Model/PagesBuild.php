<?php 

namespace GithubService\Model;

class PagesBuild
{
    use GithubTrait;
    use SafeAccess;
    
    public $commit = null;

    public $createdAt = null;

    public $duration = null;

    /**
     * @var \GithubService\Model\IndexingSuccess $error
     */
    public $error = null;

    /**
     * @var \GithubService\Model\User $pusher
     */
    public $pusher = null;

    public $status = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['commit', 'commit'],
            ['createdAt', 'created_at'],
            ['duration', 'duration'],
            ['error', 'error', 'class' => 'GithubService\\Model\\IndexingSuccess'],
            ['pusher', 'pusher', 'class' => 'GithubService\\Model\\User'],
            ['status', 'status'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
