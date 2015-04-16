<?php 

namespace GithubService\Model;

class PullComment extends \GithubService\Model\DataMapper {

    public $body = null;

    public $commitId = null;

    public $createdAt = null;

    public $diffHunk = null;

    public $htmlUrl = null;

    public $id = null;

    /**
     * @var \GithubService\Model\ $links
     */
    public $links = null;

    public $originalCommitId = null;

    public $originalPosition = null;

    public $path = null;

    public $position = null;

    public $pullRequestUrl = null;

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
            ['diffHunk', 'diff_hunk'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            //TODO restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['originalCommitId', 'original_commit_id'],
            ['originalPosition', 'original_position'],
            ['path', 'path'],
            ['position', 'position'],
            ['pullRequestUrl', 'pull_request_url'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
