<?php 

namespace GithubService\Model;

class RepoStatsCommitActivityChild
{
    use GithubTrait;
    use SafeAccess;
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
