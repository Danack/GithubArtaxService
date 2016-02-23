<?php 

namespace GithubService\Model;

class Timezone
{
    public $identifier = null;

    protected function getDataMap() {
        $dataMap = [
            ['identifier', 'identifier'],
        ];

        return $dataMap;
    }
}
