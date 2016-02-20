<?php


namespace GithubService;

use GithubService\Model\DataMapperException;

class DataMap
{
    // Index 0 - the property name in the object
    public $propertyName;
    
    // Index 1 - the property path in the data returned by the API. For multi-level
    //                                    path, use an array for each segment of the path.
    //    ['result', 'property_name'],    
    public $propertyPath;
    
    // Index 'optional' - Optional flag of whether the property is optional.
    // Default is false and an Exception will be thrown if the value is not
    // available in the data.
    public $optional = false;

    // Index 'multiple' - optional flag of whether the property should be created as
    // an array. Default is false.
    public $multiple = false;

    // Index 'class' - optional flag of whether to create the
    // property as an object. Value must be fully namespaced.
    public $class = null;
    
    // Index 'unindex' - Optional flag of whether to 'unindex' the value from an
    // array to a plain value, if the value is an array. e.g.
    // $tag = $tag['_content']. Has no effect if the value is not an array or if that 
    // key is not set.
    public $unindex = null;

    // Whether the keys should be preserved, default is false
    public $preserveKeys = false;
    
    private function __construct($propertyName, $propertyPath)
    {
        $this->propertyName = $propertyName;
        $this->propertyPath = $propertyPath;
    }
    
    public static function fromMappingArray(array $dataMapping)
    {
        $requiredKeys = [0, 1];
        $optionalKeys = [
            'optional',
            'multiple',
            'class',
            'unindex',
            'preserveKeys'
        ];
        
        $knownKeys = array_merge($requiredKeys, $optionalKeys);

        foreach ($requiredKeys as $requiredKey) {
            if (array_key_exists($requiredKey, $dataMapping) === false) {
                throw new DataMapperException(
                    "Required key of $requiredKey is missing from:".var_export($dataMapping, true)
                );
            }
        }

        foreach (array_keys($dataMapping) as $key) {
            if (in_array($key, $knownKeys) === false) {
                throw new DataMapperException("Unknown key $key in DataMapper data.");
            }
        }

        $instance = new self($dataMapping[0], $dataMapping[1]);

        if (array_key_exists('optional', $dataMapping) === true) {
            $instance->optional = $dataMapping['optional'];
        }
        if (array_key_exists('multiple', $dataMapping) === true) {
            $instance->multiple = $dataMapping['multiple'];
        }
        if (array_key_exists('class', $dataMapping) === true) {
            $instance->class = $dataMapping['class'];
        }
        if (array_key_exists('unindex', $dataMapping) === true) {
            $instance->unindex = $dataMapping['unindex'];
        }
        if (array_key_exists('preserveKeys', $dataMapping) === true) {
            $instance->preserveKeys = $dataMapping['preserveKeys'];
        }

        return $instance;
    }
}
