<?php 

namespace GithubService\Model;

class IndexingSuccess extends \GithubService\Model\DataMapper {

    public $message = null;

    protected function getDataMap() {
        $dataMap = [
            ['message', 'message'],
        ];

        return $dataMap;
    }


}
