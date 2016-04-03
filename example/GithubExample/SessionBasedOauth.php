<?php


namespace GithubExample;

use ASM\Session;
use GithubService\AuthToken;
use GithubService\AuthToken\NullToken;
use GithubService\AuthToken\Oauth2Token;

class SessionBasedOauth
{
    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    
    public function save(AuthToken $authToken)
    {
        $token = $authToken->getToken();

        $this->session->setSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, $token);
    }

    public function forget()
    {
        $this->session->setSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, '');
    }

    public function loadOauth()
    {
        $data = $this->session->getSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, null);
        if ($data == null) {
            return new NullToken();
        }

        if (strpos($data, 'token ') === 0) {
            $data = substr($data, strlen('token '));
        }
        
        $token = new Oauth2Token($data);

        return $token;
    }
}
