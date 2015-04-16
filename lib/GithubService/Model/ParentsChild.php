<?php 

namespace GithubService\Model;

class ParentsChild extends \GithubService\Model\DataMapper {

    public $htmlUrl = null;

    public $sha = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['htmlUrl', 'html_url'],
            ['sha', 'sha'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
