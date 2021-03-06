<?php 

namespace GithubService\Model;

class RepoStatsContributorsChild
{
    use GithubTrait;
    use SafeAccess;
    /**
     * @var \GithubService\Model\User $author
     */
    public $author = null;

    public $total = null;

    /**
     * @var \GithubService\Model\ $weeks
     */
    public $weeks = null;

    protected function getDataMap() {
        $dataMap = [
            ['author', 'author', 'class' => 'GithubService\\Model\\User'],
            ['total', 'total'],
            ['weeks', 'weeks', 'class' => 'GithubService\\Model\\Weeks'],
        ];

        return $dataMap;
    }
}
