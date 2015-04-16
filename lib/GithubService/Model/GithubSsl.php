<?php 

namespace GithubService\Model;

class GithubSsl extends \GithubService\Model\DataMapper {

    public $cert = null;

    public $enabled = null;

    public $key = null;

    protected function getDataMap() {
        $dataMap = [
            ['cert', 'cert'],
            ['enabled', 'enabled'],
            ['key', 'key'],
        ];

        return $dataMap;
    }


}
