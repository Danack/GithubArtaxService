<?php 

namespace GithubService\Model;

class FullGist extends \GithubService\Model\DataMapper {

    public $comments = null;

    public $commentsUrl = null;

    public $commitsUrl = null;

    public $createdAt = null;

    public $description = null;

    /**
     * @var \GithubService\Model\ $files
     */
    public $files = null;

    /**
     * @var \GithubService\Model\ $forks
     */
    public $forks = null;

    public $forksUrl = null;

    public $gitPullUrl = null;

    public $gitPushUrl = null;

    /**
     * @var \GithubService\Model\ $history
     */
    public $history = null;

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
            ['forks', 'forks', 'class' => 'GithubService\\Model\\Forks'],
            ['forksUrl', 'forks_url'],
            ['gitPullUrl', 'git_pull_url'],
            ['gitPushUrl', 'git_push_url'],
            ['history', 'history', 'class' => 'GithubService\\Model\\History'],
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
