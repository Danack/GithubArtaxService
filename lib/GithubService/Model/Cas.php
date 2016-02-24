<?php 

namespace GithubService\Model;

class Cas
{
    use GithubTrait;
    use SafeAccess;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
