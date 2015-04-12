<?php


namespace GithubService\Model;


class DataMapperException extends \Exception {

    private $values;

    public function __construct($message = "", $code = 0, \Exception $previous = null, $values = []) { 
        parent::__construct($message, $code, $previous);
        
        $this->values = $values;
    }
    
    
    public function displayProblem() {
        echo "Message: ".$this->message."\n";
        print_r($this->values);
    }
    
}
