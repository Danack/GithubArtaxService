<?php


namespace GithubExample\Context;

use GithubService\Model\AccessResponse;

class OauthSuccessContext
{
    public $accessResponse;

    private function __construct()
    {
    }

    public static function create(AccessResponse $accessResponse)
    {
        $instance = new self();
        $instance->accessResponse = $accessResponse;
        
        return $instance;
    }
}
