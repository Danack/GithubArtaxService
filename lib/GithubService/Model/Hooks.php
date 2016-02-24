<?php 

namespace GithubService\Model;

class Hooks
{
    use GithubTrait;
    use SafeAccess;
    
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
