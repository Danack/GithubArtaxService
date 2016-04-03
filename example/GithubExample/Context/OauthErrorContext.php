<?php


namespace GithubExample\Context;

use GithubService\Model\AccessResponse;

class OauthErrorContext
{
    public $errorMessage;
    
    private function __construct()
    {
    }

    public static function create($errorMessage)
    {
        $instance = new self();
        $instance->errorMessage = $errorMessage;
        
        return $instance;
    }
}
