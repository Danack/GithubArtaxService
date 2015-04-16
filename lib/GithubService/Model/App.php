<?php 

namespace GithubService\Model;

class App extends \GithubService\Model\DataMapper {

    public $clientId = null;

    public $name = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['clientId', 'client_id'],
            ['name', 'name'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
