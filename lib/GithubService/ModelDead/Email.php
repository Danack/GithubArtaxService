<?php

namespace GithubService\Model;


class Email {

    use DataMapper;

    public $address;
    public $verified;
    public $primary; 
   
    static protected $dataMap = array(
        ['address', 'email'],
        ['verified', 'verified'],
        ['primary', 'primary'],
    );
}
