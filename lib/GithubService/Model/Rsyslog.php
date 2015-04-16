<?php 

namespace GithubService\Model;

class Rsyslog extends \GithubService\Model\DataMapper {

    public $enabled = null;

    public $protocolName = null;

    public $server = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['protocolName', 'protocol_name'],
            ['server', 'server'],
        ];

        return $dataMap;
    }


}
