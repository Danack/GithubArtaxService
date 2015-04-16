<?php 

namespace GithubService\Model;

class CurrentUser extends \GithubService\Model\DataMapper {

    public $href = null;

    public $type = null;

    protected function getDataMap() {
        $dataMap = [
            ['href', 'href'],
            ['type', 'type'],
        ];

        return $dataMap;
    }


}
