<?php


namespace GithubExample\Context;

class StartOauthRequest
{
    public $scopesString;
    public $authURL;

    private function __construct() {}

    public static function create($scopes, $authURL)
    {
        $context = new self();
        $context->scopesString = implode(', ', $scopes);
        $context->authURL = $authURL;

        return $context;
    }
}
