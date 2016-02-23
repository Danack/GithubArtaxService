<?php 

namespace GithubService\Model;

class SimplePublicKey
{
    public $id = null;

    public $key = null;

    protected function getDataMap() {
        $dataMap = [
            ['id', 'id'],
            ['key', 'key'],
        ];

        return $dataMap;
    }
}
