<?php 

namespace GithubService\Model;

class GetAuthorizedSshKeysChild
{
    public $key = null;

    public $prettyPrint = null;

    protected function getDataMap() {
        $dataMap = [
            ['key', 'key'],
            ['prettyPrint', 'pretty-print'],
        ];

        return $dataMap;
    }
}
