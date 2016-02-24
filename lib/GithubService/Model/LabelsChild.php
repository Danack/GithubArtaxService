<?php 

namespace GithubService\Model;

class LabelsChild
{
    use GithubTrait;
    use SafeAccess;
    
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
