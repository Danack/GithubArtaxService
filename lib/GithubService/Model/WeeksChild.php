<?php 

namespace GithubService\Model;

class WeeksChild extends \GithubService\Model\DataMapper {

    public $a = null;

    public $c = null;

    public $d = null;

    public $w = null;

    protected function getDataMap() {
        $dataMap = [
            ['a', 'a'],
            ['c', 'c'],
            ['d', 'd'],
            ['w', 'w'],
        ];

        return $dataMap;
    }


}
