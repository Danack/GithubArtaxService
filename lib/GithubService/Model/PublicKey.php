<?php 

namespace GithubService\Model;

class PublicKey
{
    use GithubTrait;
    use SafeAccess;
    
    public $createdAt = null;

    public $id = null;

    public $key = null;

    public $title = null;

    public $url = null;

    public $verified = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['id', 'id'],
            ['key', 'key'],
            ['title', 'title'],
            ['url', 'url'],
            ['verified', 'verified'],
        ];

        return $dataMap;
    }
}
