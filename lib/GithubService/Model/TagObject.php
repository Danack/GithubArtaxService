<?php 

namespace GithubService\Model;

class TagObject
{
    use GithubTrait;
    use SafeAccess;
    
    public $url;
    public $sha;
    public $type;

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
            ['sha', 'sha'],
            ['type', 'type'],
        ];

        return $dataMap;
    }
}
