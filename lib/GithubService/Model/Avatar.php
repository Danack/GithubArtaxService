<?php 

namespace GithubService\Model;

class Avatar 
{
    public $enabled = null;

    public $uri = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['uri', 'uri'],
        ];

        return $dataMap;
    }
}
