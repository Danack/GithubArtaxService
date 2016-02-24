<?php 

namespace GithubService\Model;

class FullRepo
{
    use GithubTrait;
    use SafeAccess;
    
    public $cloneUrl = null;

    public $createdAt = null;

    public $defaultBranch = null;

    public $description = null;

    public $fork = null;

    public $forksCount = null;

    public $fullName = null;

    public $gitUrl = null;

    public $hasDownloads = null;

    public $hasIssues = null;

    public $hasPages = null;

    public $hasWiki = null;

    public $homepage = null;

    public $htmlUrl = null;

    public $id = null;

    public $language = null;

    public $mirrorUrl = null;

    public $name = null;

    public $openIssuesCount = null;

    /**
     * @var \GithubService\Model\User $organization
     */
    public $organization = null;

    /**
     * @var \GithubService\Model\User $owner
     */
    public $owner = null;

    /**
     * @var \GithubService\Model\Repo $parent
     */
    public $parent = null;

    /**
     * @var \GithubService\Model\Permissions $permissions
     */
    public $permissions = null;

    public $private = null;

    public $pushedAt = null;

    public $size = null;

    /**
     * @var \GithubService\Model\Repo $source
     */
    public $source = null;

    public $sshUrl = null;

    public $stargazersCount = null;

    public $subscribersCount = null;

    public $svnUrl = null;

    public $updatedAt = null;

    public $url = null;

    public $watchersCount = null;

    protected function getDataMap() {
        $dataMap = [
            ['cloneUrl', 'clone_url'],
            ['createdAt', 'created_at'],
            ['defaultBranch', 'default_branch'],
            ['description', 'description'],
            ['fork', 'fork'],
            ['forksCount', 'forks_count'],
            ['fullName', 'full_name'],
            ['gitUrl', 'git_url'],
            ['hasDownloads', 'has_downloads'],
            ['hasIssues', 'has_issues'],
            ['hasPages', 'has_pages'],
            ['hasWiki', 'has_wiki'],
            ['homepage', 'homepage'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['language', 'language'],
            ['mirrorUrl', 'mirror_url'],
            ['name', 'name'],
            ['openIssuesCount', 'open_issues_count'],
            ['organization', 'organization', 'class' => 'GithubService\\Model\\User'],
            ['owner', 'owner', 'class' => 'GithubService\\Model\\User'],
            ['parent', 'parent', 'class' => 'GithubService\\Model\\Repo'],
            ['permissions', 'permissions', 'class' => 'GithubService\\Model\\Permissions'],
            ['private', 'private'],
            ['pushedAt', 'pushed_at'],
            ['size', 'size'],
            ['source', 'source', 'class' => 'GithubService\\Model\\Repo'],
            ['sshUrl', 'ssh_url'],
            ['stargazersCount', 'stargazers_count'],
            ['subscribersCount', 'subscribers_count'],
            ['svnUrl', 'svn_url'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['watchersCount', 'watchers_count'],
        ];

        return $dataMap;
    }


}
