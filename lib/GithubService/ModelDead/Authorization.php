<?php


namespace GithubService\Model;


class Authorization {

    use DataMapper;
    
    public $id;
    public $url;
    public $scopes;
    public $token;
    
    /** @var  \GithubService\Model\Application */
    public $application;
    
    public $note;
    public $noteURL;
    public $updatedAt;
    public $createdAt;
    
    static protected $dataMap = array(
        ['id', 'id' ],
        ['url', 'url'],
        ['scopes', 'scopes', 'multiple' => true],
        ['token', 'token'],
        ['application', ['app'], 'class' => '\GithubService\Model\Application'],
        ['note', 'note'],
        ['noteURL', 'note_url'],
        ['updatedAt', 'updated_at'],
        ['createdAt', 'created_at']
    );

    /**
     * Allows this object to be used as an Authorization in
     * the api calls.
     * @return null|string
     */
    public function __toString() {
        if ($this->token === null) {
            return null;
        }

        return "token ".$this->token;
    }
}

 