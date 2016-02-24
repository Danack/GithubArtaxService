<?php 

namespace GithubService\Model;

class Gist
{
    use GithubTrait;
    use SafeAccess;
    
    public $comments = null;

    public $commentsUrl = null;

    public $commitsUrl = null;

    public $createdAt = null;

    public $description = null;

    /**
     * @var \GithubService\Model\FileList[] $files
     */
    public $files = null;

    public $forksUrl = null;

    public $gitPullUrl = null;

    public $gitPushUrl = null;

    public $htmlUrl = null;

    public $id = null;

    /**
     * @var \GithubService\Model\User $owner
     */
    public $owner = null;

    public $public = null;

    public $updatedAt = null;

    public $url = null;

    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['comments', 'comments'],
            ['commentsUrl', 'comments_url'],
            ['commitsUrl', 'commits_url'],
            ['createdAt', 'created_at'],
            ['description', 'description'],
            ['files', 'files', 'class' => 'GithubService\\Model\\Files'],
            ['forksUrl', 'forks_url'],
            ['gitPullUrl', 'git_pull_url'],
            ['gitPushUrl', 'git_push_url'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['owner', 'owner', 'class' => 'GithubService\\Model\\User'],
            ['public', 'public'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user'],
        ];

        return $dataMap;
    }
}
