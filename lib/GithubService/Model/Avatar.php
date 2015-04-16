<?php 

namespace GithubService\Model;

class Avatar extends \GithubService\Model\DataMapper {

    public $enabled = null;

    public $uri = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['uri', 'uri'],
        ];

        return $dataMap;
    }


}
