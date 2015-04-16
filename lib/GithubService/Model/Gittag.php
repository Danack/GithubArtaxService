<?php 

namespace GithubService\Model;

class Gittag extends \GithubService\Model\DataMapper {

    public $message = null;

    /**
     * @var \GithubService\Model\ $object
     */
    public $object = null;

    public $sha = null;

    public $tag = null;

    /**
     * @var \GithubService\Model\Author $tagger
     */
    public $tagger = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['message', 'message'],
            ['object', 'object', 'class' => 'GithubService\\Model\\TagObject'],
            ['sha', 'sha'],
            ['tag', 'tag'],
            ['tagger', 'tagger', 'class' => 'GithubService\\Model\\Author'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}