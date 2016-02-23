<?php 

namespace GithubService\Model;

class OauthAccess
{
    /**
     * @var \GithubService\Model\App
     */
    public $app = null;

    public $createdAt = null;

    public $fingerprint = null;

    public $hashedToken = null;

    public $id = null;

    public $note = null;

    public $noteUrl = null;

    public $scopes = [];

    public $token = null;

    public $tokenLastEight = null;

    public $updatedAt = null;

    public $url = null;
    
    /**
     * Allows this object to be used as an Authorization in
     * the api calls.
     * @return null|string
     */
    public function __toString()
    {
        if ($this->token === null) {
            return null;
        }

        return "token ".$this->hashedToken;
    }
}
