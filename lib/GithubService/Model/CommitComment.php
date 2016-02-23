<?php 

namespace GithubService\Model;

class CommitComment
{
    public $body = null;

    public $commitId = null;

    public $createdAt = null;

    public $htmlUrl = null;

    public $id = null;

    public $line = null;

    public $path = null;

    public $position = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['body', 'body'],
            ['commitId', 'commit_id'],
            ['createdAt', 'created_at'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['line', 'line'],
            ['path', 'path'],
            ['position', 'position'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
