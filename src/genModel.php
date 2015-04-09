<?php

use Danack\Code\Generator\ClassGenerator;
use Danack\Code\Generator\PropertyGenerator;
use Danack\Code\Generator\PropertyValueGenerator;

$autoloader = require __DIR__.'/../vendor/autoload.php';


// Open an example 

$contents = @file_get_contents("searchCode.json");

$data = json_decode($contents);


$class = Guess::analyzeJSON($data, 'search');


saveClass($class);

function saveClass(Guess $class){

    static $count = 0;
    $count++;

    $classGen = new ClassGenerator($class->className);

    $classGen->addTrait('DataMapper');
    $dataMapEntries = [];

    $classEntries = $class->properties;
    $classEntries = array_merge($classEntries, $class->children);

    foreach ($classEntries as $property) {
        /** @var  $property \Property */
        $propertyGen = new PropertyGenerator();
        $propertyGen->setName($property->name);
        $classGen->addPropertyFromGenerator($propertyGen);

        $dataMapEntries[] = $property->getDataMapEntry();
    }

    $propertyGen = new PropertyGenerator();
    $propertyGen->setName('dataMap');
    $propertyGen->setDefaultValue(
        $dataMapEntries,
        PropertyValueGenerator::TYPE_AUTO,
        PropertyValueGenerator::OUTPUT_MULTIPLE_LINE
    );
    $classGen->addPropertyFromGenerator($propertyGen);

    $classString = $classGen->generate();

    $output = '<?php 

namespace GithubService\Model;

';

    $output .= $classString;

    $filename = sprintf(
        "./testOutput_%d_%s.php",
        $count,
        $class->className
    );
    
    file_put_contents($filename, $output);

    foreach ($class->children as $childClass) {
        saveClass($childClass);
    }
}





function camelCase($word) {
    $output = false;
    $parts = explode('_', $word);
    
    foreach ($parts as $part) {
        if ($output == false) {
            $output = $part;
        }
        else {
            $output .= ucfirst($part);
        }
    }
    
    return $output;
}



class Property {
    public $name;
    public $apiName;
    public $multiple;
    public $optional;

    static function create($name) {
        $instance = new static();
        $instance->name = camelCase($name);
        $instance->apiName = $name;
        $instance->multiple = false;
        return $instance;
    }

    public function getDataMapEntry() {
        $dataMapEntry = [];
        $dataMapEntry[] = $this->name;
        $dataMapEntry[] = $this->apiName;
        
        return $dataMapEntry;
    }
}




class Guess extends Property {

    public $className;

    public $children = [];

    /** @var array Property */
    public $properties = [];
    
    private static function createClass($name, $className) {
        $instance = self::create($name);
        $instance->className = $className;

        return $instance;
    }
    
    static function analyzeJSON($object, $name, $multiple = false) {
        $instance = self::createClass($name, $name);

        foreach ($object as $name => $value) {
            if (is_object($value)) {
                $childInstance = Guess::analyzeJSON($value, $name);
                $instance->children[] = $childInstance;
            }
            else if (is_array($value)) {
                foreach ($value as $key => $valueElement) {
                    if (is_object($valueElement)) {
                        $childInstance = Guess::analyzeJSON($valueElement, $name, true);
                        $instance->children[] = $childInstance;
                        break;
                    }
                    else {
                        echo "value arrays not implemented.\n";
                    }
                }
            }
            else {
                $instance->properties[] = Property::create($name);
            }
        }
     
        return $instance;
    }

    public function getDataMapEntry() {
        $dataMapEntry = parent::getDataMapEntry();
        $dataMapEntry['class'] = $this->className;

        return $dataMapEntry;
    }
}




