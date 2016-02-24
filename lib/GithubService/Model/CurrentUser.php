<?php 

namespace GithubService\Model;

class CurrentUser
{
    use GithubTrait;
    use SafeAccess;
    
    public $href = null;

    public $type = null;

    protected function getDataMap() {
        $dataMap = [
            ['href', 'href'],
            ['type', 'type'],
        ];

        return $dataMap;
    }
}
