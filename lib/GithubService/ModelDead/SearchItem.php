<?php


namespace GithubService\Model;


class SearchItem {

    use DataMapper;

    public $score;
    public $textMatches;

    public $name;
    public $path;
    public $sha;
    public $url;
    public $gitURL;
    public $htmlURL;
    public $repository;

    

    static protected $dataMap = array(

        ['name',  'name'],
        ['path',  'path'],
        ['sha',  'sha'],
        ['url',  'url'],
        ['gitURL',  'git_url'],
        ['htmlURL',  'html_url'],
        ['repository',  'repository'],
        ['score', 'score'],
        ['textMatches', 'text_matches', 'class' => 'GithubService\Model\TextMatches'],
    );

    
    
    
}

