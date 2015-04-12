<?php

use Danack\Code\Generator\ClassGenerator;
use Danack\Code\Generator\PropertyGenerator;
use Danack\Code\Generator\PropertyValueGenerator;

$autoloader = require __DIR__.'/../vendor/autoload.php';

$className = 'GithubService\Model\SearchResult';
$signature = getClassSignature($className);



$analyzer = new ResponseAnalyzer('../lib/GithubService/Model');

require_once("githubResponses.php");

foreach ($knownTypes as $knownType) {
    $analyzer->analyzeStructure($$knownType, $knownType);
    //break;
}



$analyzer->process();


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


function getSignature($propertyNames) {
    $hashFunction = function ($carry, $item) {
        $excludedParams = [
            'pager',
            'oauthscopes',
        ];

        $item = strtolower($item);
        if (in_array($item, $excludedParams) == true) {
            return $carry;
        }

        return sha1($carry.$item);
    };
    $duplicatePropertyNames = $propertyNames;
    sort($duplicatePropertyNames);

    return array_reduce($duplicatePropertyNames, $hashFunction, '');
}




function getClassSignature($className) {
    try {
        $reflection = new ReflectionClass($className);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
    
        $getPropNames = function (ReflectionProperty $property) {            
            return $property->name;
        };
    
        $propertyNames = array_map($getPropNames, $properties);

        return getSignature($propertyNames);
    }
    catch (\Exception $e) {
        echo "Failed to analyze class $className : ".$e->getMessage()."\n";
        exit(-1);
    }
}


class ResponseAnalyzer {
    
    private $knownClasses = [];

    /**
     * @var \AnalyzedClass
     */
    private $analyzedClass;
    
    private $modelDirectory;

    
    function __construct($modelDirectory) {
        $this->modelDirectory = $modelDirectory;
    }

    /**
     * @return array
     * @throws Exception
     */
    function analyzeModels() {
        $excludedFiles = [
            'DataMapper',
            'DataMapperException'
        ];

        $directoryIterator = new RecursiveDirectoryIterator(
            $this->modelDirectory,
            FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS
        );

        $iterator = new RecursiveIteratorIterator($directoryIterator);
        $regex = new RegexIterator($iterator, '/^.+\.php$/i');

        $knownClasses = [];

        foreach ($regex as $name => $object) {

            $skip = false;
            foreach ($excludedFiles as $excludedFile) {
                if (strpos($name, $excludedFile) !== false) {
                    $skip = true;
                }
            }
            if ($skip == true) {
                continue;
            }

            if (!($object instanceof \SplFileInfo)) {
                throw new \Exception("Trying to analyze something that is not a file.");
            }

            $className = 'GithubService\Model\\'.$object->getBasename(".php");

            $signature = getClassSignature($className);

            if ($signature) {
                $this->knownClasses[$className] = $signature;
            }
        }

        return $knownClasses;
    }


    /**
     * 
     */
    function analyzeStructure($data, $name) {
        $this->analyzedClass = AnalyzedClass::analyzeJSON($data, $name);
    }

    /**
     * 
     */
    function aliasKnownClasses() {

        //Remove duplicates from generated ones.
        $analyzedClasses = $this->analyzedClass->getAllClasses();
        for ($i=0 ; $i<count($analyzedClasses) ; $i++) {
            $classToCheck = $analyzedClasses[$i];

            $analyzedSignature = $classToCheck->getSignature();
            for ($j=$i+1 ; $j < count($analyzedClasses) ; $j++) {
                $classToTest = $analyzedClasses[$j];
                if ($analyzedSignature === $classToTest->getSignature()) {
                    $classToTest->setRealClassName($classToCheck->className);
                }
            }
        }

        //Remove duplicates of actual models.
        $analyzedClasses = $this->analyzedClass->getAllClasses();
        foreach ($analyzedClasses as $analyzedClass) {
            $identicalClass = $this->findIdenticalClass($analyzedClass);
            if ($identicalClass) {
                $analyzedClass->setRealClassName($identicalClass);
            }
        }
    }

    /**
     * @param AnalyzedClass $analyzedClass
     * @return bool|int|string
     */
    function findIdenticalClass(AnalyzedClass $analyzedClass) {
        $analyzedSignature = $analyzedClass->getSignature();

        foreach ($this->knownClasses as $className => $signature) {
            if ($analyzedSignature === $signature) {
                return $className;
            }
        }

        return false;
    }

    function process() {
        $this->analyzeModels();
        $this->aliasKnownClasses();
        $this->saveAllClasses();
    }
    
    /**
     * 
     */
    function saveAllClasses() {
        $analyzedClasses = $this->analyzedClass->getAllClasses();
        foreach ($analyzedClasses as $analyzedClass) {
            if ($analyzedClass->realClassName != null) {
                printf(
                    "Skipping class %s it is already present as %s\n",
                    $analyzedClass->name,
                    $analyzedClass->realClassName
                );
                
                continue;
            }

            $this->saveClass($analyzedClass);
        }
    }
    
    /**
     * @param AnalyzedClass $class
     */
    function saveClass(AnalyzedClass $class) {
        static $count = 0;
        $count++;

        $classGen = new ClassGenerator($class->className);
        $classGen->addTrait('DataMapper');
        $dataMapEntries = [];
        
        foreach ($class->properties as $property) {
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
            "../output/genModel_%d_%s.php",
            $count,
            $class->className
        );

        file_put_contents($filename, $output);
    }
}


function is_numeric_array(array $array) {
    foreach ($array as $key => $name) {
        if (is_numeric($key) == false) {
            return false;
        }
    }
    return true;
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




class AnalyzedClass extends Property {

    public $className;

    public $realClassName;

    /** @var Property[] */
    public $properties = [];

    /**
     * @param $name
     * @param $className
     * @return static
     */
    private static function createClass($name, $className) {
        $instance = self::create($name);
        $instance->className = $className;
        $instance->realClassName = null;

        return $instance;
    }

    /**
     * @param $object
     * @param $name
     * @param bool $multiple
     * @return static
     */
    static function analyzeJSON($object, $name, $multiple = false) {
        $instance = self::createClass($name, $name);
        
        if (is_object($object) == false && is_array($object) == false) {
            return null;
        }

        foreach ($object as $name => $value) {
            if (is_object($value) ||
                (is_array($value) )) { //&& is_numeric_array($value) == false)) {
                $childInstance = AnalyzedClass::analyzeJSON($value, $name);
                $instance->properties[] = $childInstance;
            }
            else if (is_array($value)) {
                foreach ($value as $key => $valueElement) {
                    if (is_object($valueElement) ||
                        (is_array($valueElement))) {// && is_numeric_array($valueElement) == false)) {
                        $childInstance = AnalyzedClass::analyzeJSON($valueElement, $name, true);
                        $instance->properties[] = $childInstance;
                        break;
                    }
                    else {

                        if (is_object($valueElement) || is_array($valueElement)) {
                            $childInstance = AnalyzedClass::analyzeJSON($valueElement, $name."_child", true);
                            $instance->properties[] = $childInstance;
                        }
                        else {
                            $instance->properties[] = Property::create($key);
                        }
                    }
                }
            }
            else {
                $instance->properties[] = Property::create($name);
            }
        }

        $sortByPropertyName = function (Property $a, Property $b) {
            return strcasecmp($a->name, $b->name);
        };

        usort($instance->properties, $sortByPropertyName);
        
        
        return $instance;
    }

    /**
     * @return array
     */
    public function getDataMapEntry() {
        $dataMapEntry = parent::getDataMapEntry();
        $dataMapEntry['class'] = $this->className;

        return $dataMapEntry;
    }

    /**
     * @return mixed
     */
    public function getSignature() {
        $propertyNames = [];
        foreach ($this->properties as $property) {
            $propertyNames[] = $property->name;
        }

        return getSignature($propertyNames);
    }

    /**
     * @param $realClassName
     */
    function setRealClassName($realClassName) {
        $this->realClassName = $realClassName;
        //echo "Setting realclass $realClassName \n";
    }

    /**
     * @return AnalyzedClass[]
     */
    function getAllClasses() {
        $allClasses = [];
        $allClasses[] = $this; 
        
        foreach ($this->properties as $childClass) {
            if ($childClass instanceof AnalyzedClass) {
                //$allClasses[] = $childClass;
                
                $childrensClases = $childClass->getAllClasses();
                $allClasses = array_merge($allClasses, $childrensClases);
            }
        }
        
        return $allClasses;
    }
    
}




