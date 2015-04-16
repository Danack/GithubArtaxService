<?php

namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Amp\Artax\Response;
use GithubService\GithubArtaxService\GithubArtaxServiceException;

use ArtaxServiceBuilder\Service\GithubPaginator;

function is_indexable($item) {
    if (is_object($item)) {
        return true;
    }
    if (is_array($item)) {
        return true;
    }
    
    return false;
}

/**
 * Class DataMapper
 *
 * Allows objects to be created directly from an array of data, mapping keynames in the array to member
 * variable of an object. Each class that uses this trait _must_ define a static $dataMap variable to define
 * how their data should be mapped.
 *
 * static protected $dataMap = array(
[
    'propertyName',                 Index 0 - the property name in the object
    ['result', 'property_name'],    Index 1 - the property path in the data returned by the API. For multi-level
                                    path, use an array for each segment of the path.
    'optional' => true              Index 'optional' - Optional flag of whether the property is optional.
                                    Default is false and an Exception will be thrown if the value is not
                                    available in the data.
    'mutliple' => true              Index 'multiple' - optional flag of whether the property should be created as
                                    an array. Default is false.
    'class'	=> 'Intahwebz\FlickrGuzzle\PropertyName'   Index 'class' - optional flag of whether to create the
                                                        property as an object. Value must be fully namespaced.
  
    'unindex' => '_content'         Index 'unindex' - Optional flag of whether to 'unindex' the value from an
                                    array to a plain value, if the value is an array. e.g.
                                    $tag = $tag['_content']. Has no effect if the value is not an array or if that 
                                    key is not set.
 
   
  'preserveKeys' => 'true'          Whether the keys should be preserved, default is false
]
 * );
 *
 * Using the $dataMap above would convert the data in:
 *
 * $jsonData['result']['property_name'] into multiple instances of the class 'PropertyName' name and assign them
 * as the property '$this->propertyName' in the class that uses this trait.
 *
 * @property array $dataMap The mapping scheme to use from values to properties.
 * @package Intahwebz\FlickrGuzzle
 */
abstract class DataMapper {

    /**
     * @var  \ArtaxServiceBuilder\Service\GithubPaginator|null
     */
    public $pager;

    /**
     * @var
     */
    public $oauthScopes = null;

    /**
     * @return mixed
     */
    abstract protected function getDataMap();

    protected function finishMapping() {
        // Nothing to do by default.
    }
    
    /**
     * @param $data
     * @return static
     * @throws DataMapperException
     */
    static function createFromData($data) {
        $instance = new static();
        $instance->mapPropertiesFromData($data);
        return $instance;
    }

    /**
     * @param Response $response
     * @param Operation $operation Unused by the Github API currently. It maybe be required for other apis
     * where some data from the request is required to interpret the resonse.
     * @return static
     * @throws \GithubService\GithubArtaxService\GithubArtaxServiceException
     */
    static function createFromResponse(Response $response, Operation $operation) {
        $json = $response->getBody();
        $data = json_decode($json, true);

        if ($data === null) {
            $lastJsonError = json_last_error();
            throw new GithubArtaxServiceException($response, "Error parsing json, last json error: ".$lastJsonError);
        }

        //An error is set...but presumably not an error code if we arrived here.
        if (isset($data['error']) == true) {
            $errorDescription = 'error_description not set, so cause unknown.';

            if (isset($data["error_description"]) == true) {
                $errorDescription = $data["error_description"];
            }

            throw new GithubArtaxServiceException($response, 'Github error: '.$errorDescription);
        }

        $instance = static::createFromData($data);

        //Header based information needs to be added after the array
        
        //Some of the data is embedded in a header.
        if ($response->hasHeader('X-OAuth-Scopes')) {
            $oauthHeaderValues = $response->getHeader('X-OAuth-Scopes');
            $oauthScopes = [];
            foreach ($oauthHeaderValues as $oauthHeaderValue) {
                $oauthScopes = explode(', ', $oauthHeaderValue);
            }
            $instance->oauthScopes = $oauthScopes;
        }
        
        $instance->pager = GithubPaginator::constructFromResponse($response);

        return $instance;
    }
    
    /**
     * Maps the properties that are in the $data param to the internal properties of the class,
     * using the static::$dataMap 
     * 
     * @param $data
     * @throws DataMapperException
     */
    function mapPropertiesFromData($data) {
        $dataMap = $this->getDataMap();
        foreach($dataMap as $dataMapElement) {
            if (is_indexable($dataMapElement) == FALSE) {
                throw new DataMapperException("DataMap for class ".__CLASS__." is not an array.");
            }

            $dataFound = FALSE;

            $sourceValue = self::extractValueFromData($data, $dataMapElement, $dataFound);
            if ($dataFound == TRUE) {
                $this->setPropertyFromValue($dataMapElement, $sourceValue);
            }
        }
        
        $this->finishMapping();
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
    static function extractValueFromData($data, $dataMapElement, &$dataFound){
        $dataFound = FALSE;

        $dataVariableNameArray = $dataMapElement[1];
        if ($dataVariableNameArray == NULL) {
            //value is likely to be a class that has been merged into the Json at the root level,
            //so pass back same array, so that the class that will be instantiated has access to all of it.
            $dataFound = TRUE;
            return $data;
        }

        if (is_indexable($dataVariableNameArray) == FALSE) {
            $dataVariableNameArray = array($dataVariableNameArray);
        }

        $value = $data;

        foreach($dataVariableNameArray as $dataVariableName) {
            if (is_array($value) == FALSE ||
                array_key_exists($dataVariableName, $value) == FALSE){
                if (array_key_exists('optional', $dataMapElement) == TRUE &&
                    $dataMapElement['optional'] == TRUE){
                    return NULL;  //This value shouldn't be used as $dataFound is not set to true.
                }

                $dataPath = implode('->', $dataVariableNameArray);
                throw new DataMapperException("DataMapper cannot find value from `$dataPath` in source JSON to map to actual value in class ".__CLASS__, 0, null, $dataMapElement);
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
    public static function unindexValue($value, $dataMapElement){
        if (array_key_exists('unindex', $dataMapElement) == TRUE) {
            $index = $dataMapElement['unindex'];
            if (is_array($value)) {
                if (array_key_exists($index, $value) == TRUE) {
                    $value = $value[$index];
                }
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
    function setPropertyFromValue($dataMapElement, $sourceValue) {
        $classVariableName = $dataMapElement[0];
        $className = FALSE;
        $multiple = FALSE;

        if(array_key_exists('class', $dataMapElement) == TRUE){
            $className = $dataMapElement['class'];
        }
        if(array_key_exists('multiple', $dataMapElement) == TRUE){
            $multiple = $dataMapElement['multiple'];
        }

        $preserveKeys = false;
        if(array_key_exists('preserveKeys', $dataMapElement) == TRUE){
            $preserveKeys = $dataMapElement['preserveKeys'];
        }

        if ($sourceValue === null) {
            //TODO - add 'optional' == true check
            //Or even better a nullable option?
            $this->{$classVariableName} = null;
            return;
        }

        if($multiple == TRUE){
            if ($this->{$classVariableName} == NULL) {
                $this->{$classVariableName} = array();
            }

            foreach($sourceValue as $key => $sourceValueInstance) {
                if($className != FALSE){
                    $object = $className::createFromData($sourceValueInstance);
                    $value = $object;
                }
                else{
                     $value = $sourceValueInstance;
                }

                if ($preserveKeys) {
                    $this->{$classVariableName}[$key] = $value; 
                }
                else {
                    $this->{$classVariableName}[] = $value;
                }
            }
        }
        else{
            if($className != FALSE){
                $object = $className::createFromData($sourceValue);
                $this->{$classVariableName} = $object;
            }
            else{
                $this->{$classVariableName} = $sourceValue;
            }
        }
    }
}