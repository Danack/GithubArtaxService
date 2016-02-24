<?php 

namespace GithubService\Model;

class GetAuthorizedSshKeysChild
{
    use GithubTrait;
    use SafeAccess;
    
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
