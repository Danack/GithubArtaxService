<?php 

namespace GithubService\Model;

class Device
{
    use GithubTrait;
    use SafeAccess;
    
    public $path = null;

    protected function getDataMap() {
        $dataMap = [
            ['path', 'path'],
        ];

        return $dataMap;
    }
}
