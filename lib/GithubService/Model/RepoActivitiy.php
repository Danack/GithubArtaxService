<?php 

namespace GithubService\Model;

class RepoActivitiy
{
    use GithubTrait;
    use SafeAccess;
    
    // a - Number of additions
    public $added = null;

    // c - Number of commits
    public $commits = null;

    // d - Number of deletions
    public $deletes = null;

    // w - Start of the week, given as a Unix timestamp.
    public $week = null;

    protected function getDataMap() {
        $dataMap = [
            ['added', 'a'],
            ['commits', 'c'],
            ['deleted', 'd'],
            ['week', 'w'],
        ];

        return $dataMap;
    }
}
