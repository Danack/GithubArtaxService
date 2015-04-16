<?php 

namespace GithubService\Model;

class Cas extends \GithubService\Model\DataMapper {

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
