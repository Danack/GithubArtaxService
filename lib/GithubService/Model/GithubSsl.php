<?php 

namespace GithubService\Model;

class GithubSsl
{
    use GithubTrait;
    use SafeAccess;
    
    public $cert = null;

    public $enabled = null;

    public $key = null;

    protected function getDataMap() {
        $dataMap = [
            ['cert', 'cert'],
            ['enabled', 'enabled'],
            ['key', 'key'],
        ];

        return $dataMap;
    }


}
