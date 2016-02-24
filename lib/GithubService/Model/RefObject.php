<?php 

namespace GithubService\Model;

class RefObject
{
    use GithubTrait;
    use SafeAccess;
    
    public $sha = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['sha', 'sha'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
