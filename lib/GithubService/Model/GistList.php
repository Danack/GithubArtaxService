<?php 

namespace GithubService\Model;

class GistList
{
    public $gists = [];

    protected function getDataMap() {
        $dataMap = [
            ['gists', '', 'multiple' => true, 'class' => 'GithubService\Model\Gist'],
        ];

        return $dataMap;
    }
}
