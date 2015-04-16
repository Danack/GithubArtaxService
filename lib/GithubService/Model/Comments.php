<?php 

namespace GithubService\Model;

class Comments extends \GithubService\Model\DataMapper {

    public $href = null;

    protected function getDataMap() {
        $dataMap = [
            ['href', 'href'],
        ];

        return $dataMap;
    }


}
