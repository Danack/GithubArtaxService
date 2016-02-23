<?php 

namespace GithubService\Model;

class Ntp
{
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
