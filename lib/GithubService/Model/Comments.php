<?php 

namespace GithubService\Model;

class Comments
{
    public $href = null;

    protected function getDataMap() {
        $dataMap = [
            ['href', 'href'],
        ];

        return $dataMap;
    }
}
