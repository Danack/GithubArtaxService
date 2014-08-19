<?php


namespace GithubService\Model;


//TODO - delete it appears to be unused

class AuthResponse {

    use DataMapper;

    public $email;
    public $verified;
    public $primary;

    static protected $dataMap = array(
        ['email', 'email'],
        ['verified', 'verified'],
        ['primary', 'primary'],
    );

}
