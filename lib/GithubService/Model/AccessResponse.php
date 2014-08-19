<?php


namespace GithubService\Model;


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
