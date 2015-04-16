<?php 

namespace GithubService\Model;

class Device extends \GithubService\Model\DataMapper {

    public $path = null;

    protected function getDataMap() {
        $dataMap = [
            ['path', 'path'],
        ];

        return $dataMap;
    }


}
