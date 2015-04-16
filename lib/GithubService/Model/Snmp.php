<?php 

namespace GithubService\Model;

class Snmp extends \GithubService\Model\DataMapper {

    public $community = null;

    public $enabled = null;

    protected function getDataMap() {
        $dataMap = [
            ['community', 'community'],
            ['enabled', 'enabled'],
        ];

        return $dataMap;
    }


}
