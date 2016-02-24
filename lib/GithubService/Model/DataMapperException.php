<?php


namespace GithubService\Model;


class HydratorException extends \Exception
{
    private $values = null;
    private $dataMapElement = null;

    public function displayProblem() {
        $output = "HydratorException: ".$this->message."\n";

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
