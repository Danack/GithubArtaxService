<?php 

namespace GithubService\Model;

class PublicKey extends \GithubService\Model\DataMapper {

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
