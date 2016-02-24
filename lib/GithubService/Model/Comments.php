<?php 

namespace GithubService\Model;

class Comments
{
    use GithubTrait;
    use SafeAccess;

    public $href = null;

    protected function getDataMap() {
        $dataMap = [
            ['href', 'href'],
        ];

        return $dataMap;
    }
}
