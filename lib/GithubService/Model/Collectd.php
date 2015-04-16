<?php 

namespace GithubService\Model;

class Collectd extends \GithubService\Model\DataMapper {

    public $enabled = null;

    public $encryption = null;

    public $password = null;

    public $port = null;

    public $server = null;

    public $username = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['encryption', 'encryption'],
            ['password', 'password'],
            ['port', 'port'],
            ['server', 'server'],
            ['username', 'username'],
        ];

        return $dataMap;
    }


}
