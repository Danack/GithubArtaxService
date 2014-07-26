<?php


namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;


use GithubService\GithubAPI\GithubAPIException;


class AccessResponse {

    use DataMapper;

    public $accessToken;
    public $scopes;
    public $tokenType;

    static protected $dataMap = array(
        ['accessToken', 'access_token'],
        ['scopes', 'scope'],
        ['tokenType', 'token_type'],
    );
}
