<?php 

namespace GithubService\Model;

class ConnectionServicesChild
{
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
