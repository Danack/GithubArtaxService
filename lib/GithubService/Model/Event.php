<?php 

namespace GithubService\Model;

class Event
{
    /**
     * @var \GithubService\Model\Author $actor
     */
    public $actor = null;

    public $createdAt = null;

    public $id = null;

    /**
     * @var \GithubService\Model\Author $org
     */
    public $org = null;

    /**
     * @var \GithubService\Model\Indices $payload
     */
    public $payload = null;

    public $public = null;

    /**
     * @var \GithubService\Model\ $repo
     */
    public $repo = null;

    public $type = null;

    protected function getDataMap() {
        $dataMap = [
            
            ['actor', 'actor', 'class' => 'GithubService\\Model\\UserInBranchAuthor'],
            ['createdAt', 'created_at'],
            ['id', 'id'],
            ['org', 'org', 'class' => 'GithubService\\Model\\UserInBranchAuthor'],
            ['payload', 'payload', 'class' => 'GithubService\\Model\\Indices'],
            ['public', 'public'],
            ['repo', 'repo', 'class' => 'GithubService\\Model\\RepoInEvent'],
            ['type', 'type'],
        ];

        return $dataMap;
    }
}
