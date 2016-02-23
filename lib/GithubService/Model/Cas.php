<?php 

namespace GithubService\Model;

class Cas
{
    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
