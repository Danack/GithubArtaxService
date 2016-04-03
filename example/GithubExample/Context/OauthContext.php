<?php


namespace GithubExample\Context;

use GithubService\AuthToken;

class OauthContext
{
    public $isAuthenticated;
    public $authToken;
    
    public function __construct($isAuthenticated, AuthToken $authToken)
    {
        $this->isAuthenticated = $isAuthenticated;
        $this->authToken = $authToken;
    }
}
