<?php 

namespace GithubService\Model;

class RepoStatsCommitActivityChild extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Indices $days
     */
    public $days = array();

    public $total = null;

    public $week = null;

    protected function getDataMap() {
        $dataMap = [
            ['days', 'days', 'multiple' => true, ],
            ['total', 'total'],
            ['week', 'week'],
        ];

        return $dataMap;
    }
}
