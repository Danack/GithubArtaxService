<?php 

namespace GithubService\Model;

class Config
{
    use GithubTrait;
    use SafeAccess;
    
    public $contentType = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['contentType', 'content_type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
