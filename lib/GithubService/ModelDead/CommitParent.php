<?php


namespace GithubService\Model;


class CommitParent {

    use DataMapper;

    static protected $dataMap = array(
        ['url', 'url'],
        ['sha', 'sha'],
    );
}

 