<?php


namespace GithubService\AuthToken;

use GithubService\AuthToken;

class Oauth2Token implements AuthToken
{
    private $accessToken;

    function __construct($accessToken) {
        $this->accessToken = $accessToken;
    }
    
    /**
     * Format the auth/bearer token as Github expect it.
     * @param $accessToken
     * @return string
     */
    public function getToken() {
        if ($this->accessToken === null) {
            return null;
        }

        return "token ".$this->accessToken;
    }
}
