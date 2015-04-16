<?php 

namespace GithubService\Model;

class Timezone extends \GithubService\Model\DataMapper {

    public $identifier = null;

    protected function getDataMap() {
        $dataMap = [
            ['identifier', 'identifier'],
        ];

        return $dataMap;
    }


}
