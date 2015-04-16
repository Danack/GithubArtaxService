<?php 

namespace GithubService\Model;

class Ntp extends \GithubService\Model\DataMapper {

    public $primaryServer = null;

    public $secondaryServer = null;

    protected function getDataMap() {
        $dataMap = [
            ['primaryServer', 'primary_server'],
            ['secondaryServer', 'secondary_server'],
        ];

        return $dataMap;
    }


}
