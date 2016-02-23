<?php 

namespace GithubService\Model;

class RefObject
{
    public $sha = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['sha', 'sha'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
