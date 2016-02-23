<?php 

namespace GithubService\Model;

class LabelsChild
{
    public $color = null;

    public $name = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['color', 'color'],
            ['name', 'name'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
