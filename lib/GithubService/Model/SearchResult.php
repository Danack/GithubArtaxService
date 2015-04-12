<?php


namespace GithubService\Model;



class SearchResult {

    use DataMapper;
    
    public $totalCount;
    public $incompleteResults;
    

    //Accept: application/vnd.github.v3.text-match+json

    public $items;


    static protected $dataMap = array(
        ['totalCount', 'total_count'],
        ['incompleteResults', 'incomplete_results'],
        
        ['items', 'items', 'class' => 'GithubService\Model\SearchItem', 'multiple' => true],

    );
}

