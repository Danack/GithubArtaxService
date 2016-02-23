<?php 

namespace GithubService\Model;

class RepoStatsCommitActivity
{
    //Returns the last year of commit activity grouped by week. The days array is a group of commits per day, starting on Sunday.

    /**
     * @var \GithubService\Model\RepoStatsCommitActivityChild $repoStats
     */
    public $repoStats = array();

    protected function getDataMap() {
        $dataMap = [
            ['repoStats', '', 'multiple' => true, 'class' => 'GithubService\Model\RepoStatsCommitActivityChild'],
        ];

        return $dataMap;
    }
}
