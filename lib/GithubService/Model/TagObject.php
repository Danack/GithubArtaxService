<?php 

namespace GithubService\Model;

class TagObject
{// extends \GithubService\Model\DataMapper {

    public $url;
    public $sha;
    public $type;

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
            ['sha', 'sha'],
            ['type', 'type'],
        ];

        return $dataMap;
    }


}
