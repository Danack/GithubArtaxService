<?php 

namespace GithubService\Model;

class ProgressChild extends \GithubService\Model\DataMapper {

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
