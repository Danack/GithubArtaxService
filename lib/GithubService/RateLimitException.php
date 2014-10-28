<?php


namespace GithubService;


class RateLimitException extends \Exception {

    public $resetTime;
    
    public function __construct($resetTime, $message = "", $code = 0, \Exception $previous = null) {
        $this->resetTime = $resetTime;
        parent::__construct($message, $code, $previous);
    }
}

 