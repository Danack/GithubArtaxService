<?php 

namespace GithubService\Model;

class FullPull extends \GithubService\Model\DataMapper {

    public $additions = null;

    /**
     * @var \GithubService\Model\ $base
     */
    public $base = null;

    public $body = null;

    public $changedFiles = null;

    public $closedAt = null;

    public $comments = null;

    public $commentsUrl = null;

    public $commits = null;

    public $commitsUrl = null;

    public $createdAt = null;

    public $deletions = null;

    public $diffUrl = null;

    /**
     * @var \GithubService\Model\Base $head
     */
    public $head = null;

    public $htmlUrl = null;

    public $id = null;

    public $issueUrl = null;

    /**
     * @var \GithubService\Model\ $links
     */
    public $links = null;

    public $mergeable = null;

    public $mergeCommitSha = null;

    public $merged = null;

    public $mergedAt = null;

    /**
     * @var \GithubService\Model\User $mergedBy
     */
    public $mergedBy = null;

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
            ['additions', 'additions'],
            ['base', 'base', 'class' => 'GithubService\\Model\\Base'],
            ['body', 'body'],
            ['changedFiles', 'changed_files'],
            ['closedAt', 'closed_at'],
            ['comments', 'comments'],
            ['commentsUrl', 'comments_url'],
            ['commits', 'commits'],
            ['commitsUrl', 'commits_url'],
            ['createdAt', 'created_at'],
            ['deletions', 'deletions'],
            ['diffUrl', 'diff_url'],
            ['head', 'head', 'class' => 'GithubService\\Model\\Base'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['issueUrl', 'issue_url'],
            // TODO - restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['mergeable', 'mergeable'],
            ['mergeCommitSha', 'merge_commit_sha'],
            ['merged', 'merged'],
            ['mergedAt', 'merged_at'],
            ['mergedBy', 'merged_by', 'class' => 'GithubService\\Model\\User'],
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
