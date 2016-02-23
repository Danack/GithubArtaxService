<?php 

namespace GithubService\Model;

class CurrentUser
{
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
