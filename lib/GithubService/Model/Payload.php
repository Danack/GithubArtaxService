<?php 

namespace GithubService\Model;

class Payload
{
    use GithubTrait;
    use SafeAccess;
    
    public $task = null;

    protected function getDataMap() {
        $dataMap = [
            ['task', 'task'],
        ];

        return $dataMap;
    }
}
