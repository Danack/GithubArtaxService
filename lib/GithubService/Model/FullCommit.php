<?php 

namespace GithubService\Model;

class FullCommit
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\User $author
     */
    public $author = null;

    public $commentsUrl = null;

    /**
     * @var \GithubService\Model\Commit $commit
     */
    public $commit = null;

    /**
     * @var \GithubService\Model\User $committer
     */
    public $committer = null;

    /**
     * @var \GithubService\Model\FileList $files
     */
    public $files = null;

    public $htmlUrl = null;

    /**
     * @var \GithubService\Model\Parents $parents
     */
    public $parents = null;

    public $sha = null;

    /**
     * @var \GithubService\Model\ $stats
     */
    public $stats = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['author', 'author', 'class' => 'GithubService\\Model\\User'],
            ['commentsUrl', 'comments_url'],
            ['commit', 'commit', 'class' => 'GithubService\\Model\\Commit'],
            ['committer', 'committer', 'class' => 'GithubService\\Model\\User'],
            ['files', 'files', 'class' => 'GithubService\\Model\\Files'],
            ['htmlUrl', 'html_url'],
            ['parents', 'parents', 'class' => 'GithubService\\Model\\Parents'],
            ['sha', 'sha'],
            ['stats', 'stats', 'class' => 'GithubService\\Model\\Stats'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
