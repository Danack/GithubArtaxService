<?php 

namespace GithubService\Model;

use GithubService\GithubArtaxService\GithubArtaxServiceException;

class OauthAccess
{
    use GithubTrait;
    use SafeAccess;
    
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
            throw new GithubArtaxServiceException("Token is null, Oauth token can't be used.");
        }
        
        if (strlen($this->token) === 0) {
            throw new GithubArtaxServiceException("Token is zero length. Oauth token can't be used. Original token must be stored when creating Oauth tokens.");
        }

        return "token ".$this->token;
    }
}
