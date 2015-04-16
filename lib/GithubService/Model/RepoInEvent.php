<?php 

namespace GithubService\Model;

class RepoInEvent extends \GithubService\Model\DataMapper {

    public $url = null;

    public $name = null;

    public $id = null;    

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
            ['name', 'name'],
            ['id', 'id'],
        ];

        return $dataMap;
    }
}
