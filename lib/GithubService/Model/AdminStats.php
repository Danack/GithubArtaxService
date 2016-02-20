<?php 

namespace GithubService\Model;

class AdminStats extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $comments
     */
    public $comments = null;

    /**
     * @var \GithubService\Model\ $gists
     */
    public $gists = null;

    /**
     * @var \GithubService\Model\ $hooks
     */
    public $hooks = null;

    /**
     * @var \GithubService\Model\ $issues
     */
    public $issues = null;

    /**
     * @var \GithubService\Model\ $milestones
     */
    public $milestones = null;

    /**
     * @var \GithubService\Model\ $orgs
     */
    public $orgs = null;

    /**
     * @var \GithubService\Model\ $pages
     */
    public $pages = null;

    /**
     * @var \GithubService\Model\ $pulls
     */
    public $pulls = null;

    /**
     * @var \GithubService\Model\ $repos
     */
    public $repos = null;

    /**
     * @var \GithubService\Model\ $users
     */
    public $users = null;


    protected function getDataMap() {
        $dataMap = [
            ['comments', 'comments', 'class' => 'GithubService\\Model\\CommentStats'],
            ['gists', 'gists', 'class' => 'GithubService\\Model\\Gists'],
            ['hooks', 'hooks', 'class' => 'GithubService\\Model\\Hooks'],
            ['issues', 'issues', 'class' => 'GithubService\\Model\\IssuesStats'],
            ['milestones', 'milestones', 'class' => 'GithubService\\Model\\Milestones'],
            ['orgs', 'orgs', 'class' => 'GithubService\\Model\\Orgs'],
            ['pages', ["pages", "total_pages"]],
            ['pulls', 'pulls', 'class' => 'GithubService\\Model\\Pulls'],
            ['repos', 'repos', 'class' => 'GithubService\\Model\\Repos'],
            ['users', 'users', 'class' => 'GithubService\\Model\\UsersStats'],
        ];

        return $dataMap;
    }
}
