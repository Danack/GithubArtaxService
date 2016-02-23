<?php 

namespace GithubService\Model;

class Template
{
    public $name = null;

    public $source = null;

    protected function getDataMap() {
        $dataMap = [
            ['name', 'name'],
            ['source', 'source'],
        ];

        return $dataMap;
    }
}
