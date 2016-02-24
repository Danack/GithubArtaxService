<?php 

namespace GithubService\Model;

class ParentsChild
{
    use GithubTrait;
    use SafeAccess;
    
    public $htmlUrl = null;

    public $sha = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['htmlUrl', 'html_url'],
            ['sha', 'sha'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
