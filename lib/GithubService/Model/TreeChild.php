<?php 

namespace GithubService\Model;

class TreeChild { //extends \GithubService\Model\DataMapper {

    public $mode = null;

    public $path = null;

    public $sha = null;

    public $size = null;

    public $type = null;

    public $url = null;

//    protected function getDataMap() {
//        $dataMap = [
//            ['mode', 'mode'],
//            ['path', 'path'],
//            ['sha', 'sha'],
//            ['size', 'size', 'optional' => true],
//            ['type', 'type'],
//            ['url', 'url'],
//        ];
//
//        return $dataMap;
//    }
}
