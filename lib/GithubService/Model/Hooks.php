<?php 

namespace GithubService\Model;

class Hooks extends \GithubService\Model\DataMapper {

    public $activeHooks = null;

    public $inactiveHooks = null;

    public $totalHooks = null;

    protected function getDataMap() {
        $dataMap = [
            ['activeHooks', 'active_hooks'],
            ['inactiveHooks', 'inactive_hooks'],
            ['totalHooks', 'total_hooks'],
        ];

        return $dataMap;
    }


}
