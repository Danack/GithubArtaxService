<?php 

namespace GithubService\Model;

class Stats
{
    public $additions = null;

    public $deletions = null;

    public $total = null;

    protected function getDataMap() {
        $dataMap = [
            ['additions', 'additions'],
            ['deletions', 'deletions'],
            ['total', 'total'],
        ];

        return $dataMap;
    }
}
