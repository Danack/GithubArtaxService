<?php


namespace GithubService\Model;


use ArtaxServiceBuilder\Operation;
use Artax\Response;


class CommitParent {

    use DataMapper;

    static protected $dataMap = array(
        ['url', 'url'],
        ['sha', 'sha'],
    );
}

 