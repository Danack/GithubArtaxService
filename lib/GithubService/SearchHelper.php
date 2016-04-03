<?php


namespace GithubService;

class SearchHelper
{
    public $keywords = [];
    
    const LOCATION_NAME_DESCRIPTION = "in:name,description";    
    const LOCATION_NAME = "in:name";
    const LOCATION_DESCRIPTION = "description";
    const LOCATION_README = "in:readme";

    public $inLocation = null;

    // Size to match in kilobytes
    public $sizeMin;
    public $sizeMax;

    const INCLUDE_FORK = 'fork:true';//Matches all repositories including forked ones.
    const ONLY_FORK = 'fork:only'; // //Matches all repositories that are forked
    const EXCLUDE_FORK = ''; //Matches all repositories that are not forks.

    public $forkStatus;

//webos created:<2011-01-01
//Matches repositories with the word "webos" that were created before 2011.
//css pushed:<2013-02-01
//Matches repositories with the word "css" that were pushed to before February 2013.
//case pushed:>=2013-03-06 fork:only
//Matches repositories with the word "case" that were pushed to on or after March 6th, 2013, and that are forks.

    //user:defunkt forks:>100
    //Matches repositories from @defunkt that have more than 100 forks.
    public $forksMin;
    public $forksMax;

//rails language:javascript
//Matches repositories with the word "rails" that are written in JavaScript.

    public $languages = [];

//stars:10..20
//Matches repositories 10 to 20 stars, that are smaller than 1000 KB.
//stars:>=500 fork:true language:php
//Matches repositories with the at least 500 stars, including forked ones, that are written in PHP.

    public $starsMin;
    public $starsMax;
    
    private function createRangeString($name, $min, $max)
    {
        if ($min == null && $max == null) {
            return '';
        }
        
        if ($max == null) {
            return $name.':>='.intval($min);
        }
        
        if ($min == null) {
            return $name.':<='.intval($max);
        }

        return $name.':'.$min.'..'.intval($max);
    }
    
    public function createString()
    {
        $string = '';
        $string .= $this->createRangeString('stars', $this->starsMin, $this->starsMax);
        $string .= $this->createRangeString('forks', $this->forksMin, $this->forksMax);
        $string .= $this->createRangeString('size', $this->sizeMin, $this->sizeMax);

        if (count($this->languages)) {
            $string .= ' language:'.implode(',', $this->languages);
        }

        return $string;
    }
}
