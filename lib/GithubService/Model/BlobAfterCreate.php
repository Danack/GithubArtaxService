<?php 

namespace GithubService\Model;

class BlobAfterCreate extends \GithubService\Model\DataMapper {

    public $sha = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['sha', 'sha'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
