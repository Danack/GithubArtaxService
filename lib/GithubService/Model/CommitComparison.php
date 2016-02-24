<?php 

namespace GithubService\Model;

class CommitComparison
{
    use GithubTrait;
    use SafeAccess;

    public $aheadBy = null;

    /**
     * @var \GithubService\Model\Commit $baseCommit
     */
    public $baseCommit = null;

    public $behindBy = null;

    /**
     * @var \GithubService\Model\ $commits
     */
    public $commits = null;

    public $diffUrl = null;

    /**
     * @var \GithubService\Model\ $files
     */
    public $files = null;

    public $htmlUrl = null;

    /**
     * @var \GithubService\Model\Commit $mergeBaseCommit
     */
    public $mergeBaseCommit = null;

    public $patchUrl = null;

    public $permalinkUrl = null;

    public $status = null;

    public $totalCommits = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['aheadBy', 'ahead_by'],
            ['baseCommit', 'base_commit', 'class' => 'GithubService\\Model\\Commit'],
            ['behindBy', 'behind_by'],
            ['commits', 'commits', 'class' => 'GithubService\\Model\\Commits'],
            ['diffUrl', 'diff_url'],
            ['files', 'files', 'class' => 'GithubService\\Model\\Files'],
            ['htmlUrl', 'html_url'],
            ['mergeBaseCommit', 'merge_base_commit', 'class' => 'GithubService\\Model\\Commit'],
            ['patchUrl', 'patch_url'],
            ['permalinkUrl', 'permalink_url'],
            ['status', 'status'],
            ['totalCommits', 'total_commits'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
