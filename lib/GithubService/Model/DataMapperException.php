<?php


namespace GithubService\Model;


class DataMapperException extends \Exception {

    private $values = null;
    private $dataMapElement = null;

    public static function createBadMapping($message, array $dataMapElement, array $values) {
        $instance = new self("Failed to map data:".$message);
        $instance->values = $values;
        $instance->dataMapElement = $dataMapElement;

        return $instance;
    }
    
    public function displayProblem() {
        $output = "DataMapperException: ".$this->message."\n";

        if ($this->dataMapElement !== null) {
            $output .= "Failed to map element: \n";
            $output .= print_r($this->dataMapElement, true);
        }

        if ($this->values !== null) {
            $output .= "Values available are: \n";
            $output .= print_r($this->values, true);
        }
        
        return $output;
    }
}
