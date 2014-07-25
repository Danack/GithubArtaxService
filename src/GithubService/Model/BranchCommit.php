<?php


namespace GithubService\Model;


/**
 * Class BranchCommit Used by RepoBranches.
 * 
 * This class is very similar to Commit, but github appears to be returning the data differently.
 * Rather than have one confusing class, have two separate classes.
 * 
 * @package GithubService\Model
 */
class BranchCommit {
    use DataMapper;

    public $name;

    public $url;
    public $sha;

    static protected $dataMap = array(
        ['name', 'name'],
        ['url', ['commit', 'url']],
        ['sha', ['commit', 'sha']],
    );
}

