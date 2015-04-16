<?php 

namespace GithubService\Model;

class Template extends \GithubService\Model\DataMapper {

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