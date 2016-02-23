<?php 

namespace GithubService\Model;

class Device
{
    public $path = null;

    protected function getDataMap() {
        $dataMap = [
            ['path', 'path'],
        ];

        return $dataMap;
    }
}
