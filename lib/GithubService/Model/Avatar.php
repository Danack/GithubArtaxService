<?php 

namespace GithubService\Model;

class Avatar 
{
    use GithubTrait;
    use SafeAccess;

    public $enabled = null;

    public $uri = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['uri', 'uri'],
        ];

        return $dataMap;
    }
}
