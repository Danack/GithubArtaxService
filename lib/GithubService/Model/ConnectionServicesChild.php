<?php 

namespace GithubService\Model;

class ConnectionServicesChild extends \GithubService\Model\DataMapper {

    public $name = null;

    public $number = null;

    protected function getDataMap() {
        $dataMap = [
            ['name', 'name'],
            ['number', 'number'],
        ];

        return $dataMap;
    }


}
