<?php


namespace GithubService\Model;


class CommitParent extends DataMapper {

    public $url;
    public $sha;

    protected function getDataMap() {
        $dataMap = array(
            ['url', 'url'],
            ['sha', 'sha'],
        );

        return $dataMap;
    }
}

 