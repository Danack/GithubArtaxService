<?php 

namespace GithubService\Model;

class Pulls
{
    public $mergeablePulls = null;

    public $mergedPulls = null;

    public $totalPulls = null;

    public $unmergeablePulls = null;

    protected function getDataMap() {
        $dataMap = [
            ['mergeablePulls', 'mergeable_pulls'],
            ['mergedPulls', 'merged_pulls'],
            ['totalPulls', 'total_pulls'],
            ['unmergeablePulls', 'unmergeable_pulls'],
        ];

        return $dataMap;
    }
}
