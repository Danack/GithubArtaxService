<?php 

namespace GithubService\Model;

class CommentStats
{
    use GithubTrait;
    use SafeAccess;

    public $totalPullRequestComments;
    public $totalIssueComments;
    public $totalGistComments;
    public $totalCommitComments;

    protected function getDataMap() {
        $dataMap = [
            ["totalPullRequestComments", "total_pull_request_comments"],
            ["totalIssueComments", "total_issue_comments"],
            ["totalGistComments", "total_gist_comments"],
            ["totalCommitComments", "total_commit_comments"],
        ];

        return $dataMap;
    }
}
