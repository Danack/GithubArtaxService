<?php 

namespace GithubService\Model;

class ConnectionServicesChild
{
    use GithubTrait;
    use SafeAccess;
    
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
