<?php 

namespace GithubService\Model;

class SimplePublicKey
{
    use GithubTrait;
    use SafeAccess;
    
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
