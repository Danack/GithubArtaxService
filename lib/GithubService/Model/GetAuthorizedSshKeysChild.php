<?php 

namespace GithubService\Model;

class GetAuthorizedSshKeysChild extends \GithubService\Model\DataMapper {

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
