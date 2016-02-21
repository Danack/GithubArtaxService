<?php


namespace GithubService;

use Amp\Artax\Response;
use ArtaxServiceBuilder\Operation;
use ArtaxServiceBuilder\Service\GithubPaginator;
use GithubService\GithubArtaxService\GithubArtaxServiceException;
use GithubService\Model\DataMapperException;

function is_indexable($item) {
    if (is_object($item)) {
        return true;
    }
    if (is_array($item)) {
        return true;
    }
    
    return false;
}

class DataMapper
{
    /** @var \GithubService\Hydrator[] */
    private $hydrators = [];

    public function registerType($classname, Hydrator $hydrator)
    {
        $this->hydrators[$classname] = $hydrator;
    }

    public function extractValue(array $data, $keyName, $optional = false)
    {
        if (array_key_exists($keyName, $data) === true) {
            return $data[$keyName];
        }
        if ($optional === true) {
            return null;
        }
        throw new DataMapperException("Missing key '$keyName' in data ".var_export($data, true));
    }
    
    public function extractValueByPath(array $data, array $keyPath, $optional = false)
    {
        $loopData = $data;
        foreach ($keyPath as $keyName) {
            if (array_key_exists($keyName, $loopData) === false) {
                if ($optional === true) {
                    return null;
                }
                else {
                    throw new DataMapperException(
                        "Missing key '$keyName' in data ".var_export($data, true)
                    );
                }
            }

            $loopData = $loopData[$keyName];
        }

        return $loopData;
    }
    

    public function instantiate($classname, $data)
    {
        if (array_key_exists($classname, $this->hydrators) === false) {
            throw new DataMapperException("Cannot instantiate - unregistered class $classname");
        }

        $hydrator = $this->hydrators[$classname];
        $instance = $hydrator->hydrate($data, $this);

        return $instance;
    }
    
    /**
     * Maps the properties that are in the $data param to the internal properties of the class,
     * using the static::$dataMap 
     * 
     * @param $data
     * @throws DataMapperException
     */
    function mapPropertiesFromData($instance, $data, DataMapList $dataMapList)
    {
        foreach($dataMapList as $dataMap) {
            $dataFound = FALSE;

            $sourceValue = self::extractValueFromData($data, $dataMap, $dataFound);
            if ($dataFound == TRUE) {
                $this->setPropertyFromValue($instance, $dataMap, $sourceValue);
            }
        }

        //$this->finishMapping();
    }

    /**
     * Look in the $data for the value to be used for the mapping according to the rules set in $dataMapElement.
     *
     * @param $data
     * @param $dataMapElement
     * @param $dataFound
     * @throws DataMapperException
     * @return array|null
     */
    static function extractValueFromData($data, DataMap $dataMapElement, &$dataFound)
    {
        $dataFound = FALSE;
        
        $dataVariableNameArray = $dataMapElement->propertyPath;

        //$dataVariableNameArray = $dataMapElement[1];
        if ($dataVariableNameArray == NULL) {
            //value is likely to be a class that has been merged into the Json at the root level,
            //so pass back same array, so that the class that will be instantiated has access to all of it.
            $dataFound = TRUE;
            return $data;
        }

//        if (is_indexable($dataVariableNameArray) == FALSE) {
//            $dataVariableNameArray = array($dataVariableNameArray);
//        }

        $value = $data;

        foreach($dataVariableNameArray as $dataVariableName) {
            if (is_array($value) == FALSE ||
                array_key_exists($dataVariableName, $value) == FALSE) {
//                if (array_key_exists('optional', $dataMapElement) == TRUE &&
//                    $dataMapElement['optional'] == TRUE) {
                if ($dataMapElement->optional === true) {
                    return null;  //This value shouldn't be used as $dataFound is not set to true.
                }

                $dataPath = implode('->', $dataVariableNameArray);
                throw DataMapperException::createBadMapping(
                    "DataMapper cannot find value from `$dataPath` in source JSON to map to actual value in class ".__CLASS__, 
                    $data,
                    $dataMapElement
                );
            }

            $value = $value[$dataVariableName];
        }

        //Some API are badly behaved and return data either as
        //$tag = 'string' or $tag['_content'] = 'string'
        $value = self::unindexValue($value, $dataMapElement);
        $dataFound = TRUE;
        return $value;
    }

    /**
     * Unindex arrays to plain values if required. e.g. change
     * $title = array('_content' => 'Actual title');
     * to
     * $title = 'Actual title';
     *
     * @param $value
     * @param $dataMapElement
     * @return array
     */
    public static function unindexValue($value, DataMap $dataMapElement)
    {
        $index = $dataMapElement->unindex;
        if (is_array($value)) {
            if (array_key_exists($index, $value) == TRUE) {
                $value = $value[$index];
            }
        }

        return $value;
    }

    /**
     * Apply the value (or array of values) retrieved from Json and apply it to the instances property. If
     * the value represent a class, instantiate that class and map it's variables before setting it as the
     * properties value.
     *
     * @param $dataMapElement
     * @param $sourceValue
     */
    function setPropertyFromValue($instance, DataMap $dataMapElement, $sourceValue)
    {
        //$classVariableName = $dataMapElement[0];
        $classVariableName = $dataMapElement->propertyName;
        $className = FALSE;
        $multiple = FALSE;
        
        $className = $dataMapElement->class;
        $multiple = $dataMapElement->multiple;
        $preserveKeys = $dataMapElement->preserveKeys;
//        if(array_key_exists('class', $dataMapElement) == TRUE){
//            $className = $dataMapElement['class'];
//        }
//        if(array_key_exists('multiple', $dataMapElement) == TRUE){
//            $multiple = $dataMapElement['multiple'];
//        }
//        $preserveKeys = false;
//        if(array_key_exists('preserveKeys', $dataMapElement) == TRUE){
//            $preserveKeys = $dataMapElement['preserveKeys'];
//        }

        if ($sourceValue === null) {
            //TODO - add 'optional' == true check
            //Or even better a nullable option?
            $instance->{$classVariableName} = null;
            return;
        }

        if($multiple == TRUE){
            if ($instance->{$classVariableName} == NULL) {
                $instance->{$classVariableName} = array();
            }

            foreach($sourceValue as $key => $sourceValueInstance) {
                if($className != FALSE){
                    //$object = $className::createFromData($sourceValueInstance);
                    $object = $this->instantiate($className, $sourceValue);
                    $value = $object;
                }
                else{
                     $value = $sourceValueInstance;
                }

                if ($preserveKeys) {
                    $instance->{$classVariableName}[$key] = $value; 
                }
                else {
                    $instance->{$classVariableName}[] = $value;
                }
            }
        }
        else{
            if($className != FALSE) {
                //$object = $className::createFromData($sourceValue);
                $object = $this->instantiate($className, $sourceValue);
                $instance->{$classVariableName} = $object;
            }
            else{
                $instance->{$classVariableName} = $sourceValue;
            }
        }
    }
}