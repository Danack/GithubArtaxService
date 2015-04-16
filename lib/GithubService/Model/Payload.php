<?php 

namespace GithubService\Model;

class Payload extends \GithubService\Model\DataMapper {

    public $task = null;

    protected function getDataMap() {
        $dataMap = [
            ['task', 'task'],
        ];

        return $dataMap;
    }


}
