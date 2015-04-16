<?php 

namespace GithubService\Model;

class Ref extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Object $object
     */
    public $object = null;

    public $ref = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['object', 'object', 'class' => 'GithubService\\Model\\RefObject'],
            ['ref', 'ref'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
