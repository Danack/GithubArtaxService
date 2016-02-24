<?php 

namespace GithubService\Model;

class FullIssueEvent
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\User $actor
     */
    public $actor = null;

    public $commitId = null;

    public $createdAt = null;

    public $event = null;

    public $id = null;

    /**
     * @var \GithubService\Model\ $issue
     */
    public $issue = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['actor', 'actor', 'class' => 'GithubService\\Model\\User'],
            ['commitId', 'commit_id'],
            ['createdAt', 'created_at'],
            ['event', 'event'],
            ['id', 'id'],
            ['issue', 'issue', 'class' => 'GithubService\\Model\\Issue'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
