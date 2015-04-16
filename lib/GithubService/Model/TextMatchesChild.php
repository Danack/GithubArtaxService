<?php 

namespace GithubService\Model;

class TextMatchesChild extends \GithubService\Model\DataMapper {

    public $fragment = null;

    /**
     * @var \GithubService\Model\ $matches
     */
    public $matches = null;

    public $objectType = null;

    public $objectUrl = null;

    public $property = null;

    protected function getDataMap() {
        $dataMap = [
            ['fragment', 'fragment'],
            ['matches', 'matches', 'class' => 'GithubService\\Model\\Matches'],
            ['objectType', 'object_type'],
            ['objectUrl', 'object_url'],
            ['property', 'property'],
        ];

        return $dataMap;
    }


}
