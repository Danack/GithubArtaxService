<?php 

namespace GithubService\Model;

class Repos
{
    use GithubTrait;
    use SafeAccess;
    
    public $forkRepos = null;

    public $orgRepos = null;

    public $rootRepos = null;

    public $totalPushes = null;

    public $totalRepos = null;

    public $totalWikis = null;

    protected function getDataMap() {
        $dataMap = [
            ['forkRepos', 'fork_repos'],
            ['orgRepos', 'org_repos'],
            ['rootRepos', 'root_repos'],
            ['totalPushes', 'total_pushes'],
            ['totalRepos', 'total_repos'],
            ['totalWikis', 'total_wikis'],
        ];

        return $dataMap;
    }
}
