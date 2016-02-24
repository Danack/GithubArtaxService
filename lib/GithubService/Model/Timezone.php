<?php 

namespace GithubService\Model;

class Timezone
{
    use GithubTrait;
    use SafeAccess;
    
    public $identifier = null;

    protected function getDataMap() {
        $dataMap = [
            ['identifier', 'identifier'],
        ];

        return $dataMap;
    }
}
