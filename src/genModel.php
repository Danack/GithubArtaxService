<?php

use Danack\Code\Generator\ClassGenerator;
use Danack\Code\Generator\MethodGenerator;
use Danack\Code\Generator\PropertyGenerator;
use Danack\Code\Generator\PropertyValueGenerator;

$autoloader = require __DIR__.'/../vendor/autoload.php';

$analyzer = new ResponseAnalyzer('../lib/GithubService/Model');


//$files = getFilesInDirectory("../test/fixtures/data/githubJSON/test/", ".json");
$files = getFilesInDirectory("../test/fixtures/data/githubJSON/", ".json");

foreach ($files as $file) {
    /** @var  $file SplFileInfo */
    $jsonContents = file_get_contents($file->getPathname());
    $filename = $file->getBasename(".json");
    $json = json_decode($jsonContents);
    $newClass = $analyzer->analyzeStructure($json, $filename);

    $testCases[] = [$newClass, $filename];

    echo "There are ".count($analyzer->analyzedClasses)." known classes.\n";
}


$analyzer->process(
    'GithubService\Model',
    "../output/"
);

echo "Used model classes are: \n";
ksort($analyzer->usedModelClasses);
foreach ($analyzer->usedModelClasses as $usedModelClass => $true) {
    echo $usedModelClass."\n";
}



$fileHandle = fopen("./testCases.json", "w");

foreach ($testCases as $testCase) {
    list($analyzedClass, $jsonName) = $testCase;

    if ($analyzedClass->realClassName == null) {
        fwrite($fileHandle, "['".$analyzedClass->className."' => '".$jsonName."'],\n");
    }
}

fclose($fileHandle);







function getFilesInDirectory($directory, $extension) {
    $directoryIterator = new RecursiveDirectoryIterator(
        $directory,
        FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS
    );

    $iterator = new RecursiveIteratorIterator($directoryIterator);
    $extension = preg_quote($extension, '#');
    $filesInDirectory = new RegexIterator($iterator, "#^.+$extension$#i");
    
    return $filesInDirectory;
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

function normalizeClassName($name) {
    $name = str_replace('_', ' ', $name);
    $name = strtolower($name);
    $name = ucwords($name);
    $name = str_replace(' ', '', $name);

    return $name;
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

    public $usedModelClasses = [];

    /**
     * @var \AnalyzedClass[]
     */
    public $analyzedClasses = [];
    
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

        $filesInDirectory = getFilesInDirectory($this->modelDirectory, ".php");

        $knownClasses = [];

        foreach ($filesInDirectory as $name => $object) {

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
        $newClass = AnalyzedClass::analyzeJSON($data, $name, false);

        $this->analyzedClasses = array_merge($this->analyzedClasses, $newClass->getAllClasses());

        return $newClass;
    }

    /**
     * 
     */
    function aliasKnownClasses() {
        //Remove duplicates from generated ones.
        for ($i=0 ; $i<count($this->analyzedClasses) ; $i++) {
            $classToCheck = $this->analyzedClasses[$i];

            if ($classToCheck->realClassName != null) {
                //skip - it's already been aliased.
                continue;
            }

            $analyzedSignature = $classToCheck->getSignature();
            for ($j=$i+1 ; $j < count($this->analyzedClasses) ; $j++) {
                $classToTest = $this->analyzedClasses[$j];
                if ($analyzedSignature === $classToTest->getSignature()) {
                    $classToTest->setRealClassName($classToCheck->className);
                }
            }
        }

        //Remove duplicates of actual models.
        foreach ($this->analyzedClasses as $analyzedClass) {
            $identicalClass = $this->findIdenticalClass($analyzedClass);
            if ($identicalClass) {
                $analyzedClass->setRealClassName($identicalClass);
                $this->usedModelClasses[$identicalClass] = true;
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

    /**
     * @throws Exception
     */
    function process($namespace, $outputDirectory) {
        //$this->analyzeModels();
        $this->aliasKnownClasses();
        $this->saveAllClasses($namespace, $outputDirectory);
    }
    
    /**
     * 
     */
    function saveAllClasses($namespace, $outputDirectory) {
        foreach ($this->analyzedClasses as $analyzedClass) {
            if ($analyzedClass->realClassName != null) {
                printf(
                    "Skipping class %s it is already present as %s\n",
                    $analyzedClass->name,
                    $analyzedClass->realClassName
                );
                
                continue;
            }

            $this->saveClass($analyzedClass, $namespace, $outputDirectory);
        }
    }
    
    /**
     * @param AnalyzedClass $class
     */
    function saveClass(AnalyzedClass $class, $namespace, $outputDirectory) {
        static $count = 0;
        $count++;

        $classGen = new ClassGenerator($class->className);

        $classGen->setExtendedClass('GithubService\Model\DataMapper');
        $dataMapEntries = [];
        
        foreach ($class->properties as $property) {
            /** @var  $property \Property */
            $propertyGen = new PropertyGenerator();
            $propertyGen->setName(lcfirst($property->name));

            if ($property->multiple == true) {
                $propertyGen->setDefaultValue([]);
            }

            if ($property instanceof AnalyzedClass) {
                $propertyGen->setStandardDocBlock(
                    $namespace.'\\'.$property->realClassName
                );
            }
            
            
            $classGen->addPropertyFromGenerator($propertyGen);
            $dataMapEntries[] = $property->getDataMapEntry();
        }

        $methodGenerator = new MethodGenerator();
        $methodGenerator->setVisibility(MethodGenerator::VISIBILITY_PROTECTED);
        $methodGenerator->setName('getDataMap');

        $bodyTest = "\$dataMap = [\n";

        foreach ($dataMapEntries as $dataMapEntry) {
            $line = "    [";
            $separator = '';
            
            foreach ($dataMapEntry as $key => $value) {
                $line .= $separator;
                if (is_numeric($key) == true) {
                    $line .= var_export($value, true);
                }
                else {
                    $line .= var_export($key, true)." => ".var_export($value, true);
                }
                $separator = ', ';
            }

            $line .= "],";

            $bodyTest .= $line."\n";
        }


        $bodyTest .= "];\n\n";
        
        $bodyTest .= "return \$dataMap;\n";
        
        $methodGenerator->setBody($bodyTest);
        
        $classGen->addMethodFromGenerator($methodGenerator);

        $classString = $classGen->generate();

        $output = "<?php 

namespace $namespace;

";

        $output .= $classString;

        $filename = sprintf(
            //"../output/genModel_%d_%s.php",
            $outputDirectory."/%s.php",
            //$count,
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

    static function create($name, $multiple) {
        $instance = new static();
        $instance->name = camelCase($name);
        
        if ($name === "Users") {
            echo "asd";
        }
        $instance->apiName = $name;
        $instance->multiple = $multiple;
        return $instance;
    }

    public function getDataMapEntry() {
        $dataMapEntry = [];
        $dataMapEntry[] = lcfirst($this->name);
        $dataMapEntry[] = $this->apiName;
        
        if ($this->multiple) {
            $dataMapEntry['multiple'] = true;
        }
        
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
        $instance = self::create($name, false);
        $instance->className = $className;
        $instance->realClassName = null;
        $instance->multiple = false;

        return $instance;
    }
    
    /**
     * @param $object
     * @param $filename
     * @param bool $multiple
     * @return static
     */
    static function analyzeJSON($object, $className) {
        $normalizedClassName = normalizeClassName($className);

        if (is_object($object) == false && is_array($object) == false) {
            throw new \Exception("Neither object or array in class $className");
        }

        //Assume arrays only have one type of content. 
        if (is_array($object)) {
            $instance = self::createClass($className, $normalizedClassName);
            foreach ($object as $key => $valueElement) {
                $name = $className."_child";
                if (is_object($valueElement) || is_array($valueElement)) {
                    $childInstance = AnalyzedClass::analyzeJSON($valueElement, $name);
                    $childInstance->multiple = true;
                    $instance->properties[] = $childInstance;
                }
                else {
                    $instance->multiple = true;
                }

                return $instance;
            }
            $instance->multiple = true;
            return $instance;
        }

        $instance = self::createClass($className, $normalizedClassName);

        foreach ($object as $name => $value) {
            if (is_object($value)) {
                $childInstance = AnalyzedClass::analyzeJSON($value, $name, false);
                $instance->properties[] = $childInstance;
            }
            else if (is_array($value)) {
                $childInstance = AnalyzedClass::analyzeJSON($value, $name, false);
                $instance->properties[] = $childInstance;
                
                //$childInstance = AnalyzedClass::analyzeJSON($value, $name);
                
//                foreach ($value as $key => $valueElement) {
//                    if (is_object($valueElement) ||
//                        (is_array($valueElement))) {// && is_numeric_array($valueElement) == false)) {
//                        $childInstance = AnalyzedClass::analyzeJSON($valueElement, $name, true);
//                        $instance->properties[] = $childInstance;
//                        break;
//                    }
//                    else {
//                        if (is_object($valueElement) || is_array($valueElement)) {
//                            $childInstance = AnalyzedClass::analyzeJSON($valueElement, $name."_child", true);
//                            $instance->properties[] = $childInstance;
//                        }
//                        else {
//                            $instance->properties[] = Property::create($key, true);
//                        }
//                    }
//                }
            }
            else {
                $instance->properties[] = Property::create($name, false);
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
        
        if ($this->realClassName) {
            $dataMapEntry['class'] = 'GithubService\Model\\'.$this->realClassName;
        }
        else {
            $dataMapEntry['class'] = 'GithubService\Model\\'.$this->className;
        }

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
                $childrensClases = $childClass->getAllClasses();
                $allClasses = array_merge($allClasses, $childrensClases);
            }
        }
        
        return $allClasses;
    }
}




//
//$multiples = [
//    'commit_comment' => 'commitComments',
//    //'commit' => 'commits',
//    //'contributor' => 'contributors',
//    'deployment' => 'deploymentList',
//    'download' => 'downloads',
//    'event' => 'events',
//    'file' => 'fileList',
//    'hook' => 'hooks',
//    'gist' => 'gists',
//    'issue' => 'issues',
//    'full_team' => 'fullTeamList',
//    'gist_comment' => 'gistComments',
//    'issue_comment' => 'issueComments',
//    'issue_event' => 'issueEvents',
//    'full_issue_event' => 'fullIssueEventsList',
//    'label' => 'labels',
//    'milestone' => 'milestones',
//    'org' => 'orgList',
//    'org_hook' => 'orgHookList',
//    'pull' => 'pullList',
//    'deploy_key' => 'deployKeys',
//    'pages_build' => 'pagesBuildList',
//    'pull_comment' => 'pullCommentList',
//    'release' => 'releaseList',
//    'release_asset' => 'releaseAssetList',
//    'repo' => 'repoList',
//    'simple_repo' => 'simpleRepoList',
//    'status' => 'statusList',
//    'tag' => 'tagList',
//    'team' => 'teamList',
//    'thread' => 'threadList',
//    'user' => 'userList',
//    'simple_public_key' => 'simplePublicKeyList',
//    'public_key' => 'publicKeyList',
//];
//