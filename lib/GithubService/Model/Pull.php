<?php 

namespace GithubService\Model;

class Pull
{
    /**
     * @var \GithubService\Model\Base $base
     */
    public $base = null;

    public $body = null;

    public $closedAt = null;

    public $commentsUrl = null;

    public $commitsUrl = null;

    public $createdAt = null;

    public $diffUrl = null;

    /**
     * @var \GithubService\Model\Base $head
     */
    public $head = null;

    public $htmlUrl = null;

    public $id = null;

    public $issueUrl = null;

    /**
     * @var \GithubService\Model\Links $links
     */
    public $links = null;

    public $mergedAt = null;

    public $number = null;

    public $patchUrl = null;

    public $reviewCommentsUrl = null;

    public $reviewCommentUrl = null;

    public $state = null;

    public $statusesUrl = null;

    public $title = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['base', 'base', 'class' => 'GithubService\\Model\\Base'],
            ['body', 'body'],
            ['closedAt', 'closed_at'],
            ['commentsUrl', 'comments_url'],
            ['commitsUrl', 'commits_url'],
            ['createdAt', 'created_at'],
            ['diffUrl', 'diff_url'],
            ['head', 'head', 'class' => 'GithubService\\Model\\Base'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['issueUrl', 'issue_url'],
            //TODO - links needs to be renabled
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['mergedAt', 'merged_at'],
            ['number', 'number'],
            ['patchUrl', 'patch_url'],
            ['reviewCommentsUrl', 'review_comments_url'],
            ['reviewCommentUrl', 'review_comment_url'],
            ['state', 'state'],
            ['statusesUrl', 'statuses_url'],
            ['title', 'title'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
