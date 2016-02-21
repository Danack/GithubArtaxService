<?php 

namespace GithubService\Model;

class Payload
{
    public $task = null;

    protected function getDataMap() {
        $dataMap = [
            ['task', 'task'],
        ];

        return $dataMap;
    }
}
