<?php


namespace GithubService\Model;


class Teams {
    
    use DataMapper;

    /** @var  \GithubService\Model\Team[] */
    public $teams;

    static protected $dataMap = array(
        ['teams', [], 'class' => 'GithubService\Model\Team', 'multiple' => true],
    );
}

 