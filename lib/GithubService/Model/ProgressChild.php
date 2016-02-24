<?php 

namespace GithubService\Model;

class ProgressChild
{
    use GithubTrait;
    use SafeAccess;
    
    public $key = null;

    public $status = null;

    protected function getDataMap() {
        $dataMap = [
            ['key', 'key'],
            ['status', 'status'],
        ];

        return $dataMap;
    }
}
