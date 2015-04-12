<?php


namespace GithubService\Model;


class TextMatch {

    use DataMapper;

    public $objectURL;
    public $objectType;
    public $property;
    public $fragment;
    public $matches;

    static protected $dataMap = array(
        ["objectURL", "object_url"],
        ["objectType", "object_type"],
        ["property", "property"],
        ["fragment", "fragment"],
        ["matches", "matches", 'class' => 'GithubService\Model\Match', 'multiple' => true],
    );
    
}

