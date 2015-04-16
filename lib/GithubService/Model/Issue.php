<?php 

namespace GithubService\Model;

class Issue extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\User $assignee
     */
    public $assignee = null;

    public $body = null;

    public $closedAt = null;

    public $comments = null;

    public $createdAt = null;

    public $htmlUrl = null;

    public $id = null;

    /**
     * @var \GithubService\Model\Labels $labels
     */
    public $labels = null;

    /**
     * @var \GithubService\Model\Milestone $milestone
     */
    public $milestone = null;

    public $number = null;

    /**
     * @var \GithubService\Model\PullRequest $pullRequest
     */
    public $pullRequest = null;

    public $state = null;

    public $title = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['assignee', 'assignee', 'class' => 'GithubService\\Model\\User'],
            ['body', 'body'],
            ['closedAt', 'closed_at'],
            ['comments', 'comments'],
            ['createdAt', 'created_at'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['labels', 'labels', 'class' => 'GithubService\\Model\\Labels'],
            ['milestone', 'milestone', 'class' => 'GithubService\\Model\\Milestone'],
            ['number', 'number'],
            ['pullRequest', 'pull_request', 'class' => 'GithubService\\Model\\PullRequest'],
            ['state', 'state'],
            ['title', 'title'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
