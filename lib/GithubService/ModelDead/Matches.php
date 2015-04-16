<?php


namespace GithubService\Model;


class Matches {


    use DataMapper;

    public $text;
    public $indices;

    static protected $dataMap = array(
        ['text', 'text'],
        ['indices', 'indices'],
    );

    
}

