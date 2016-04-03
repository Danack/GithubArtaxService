<?php

namespace GithubService;

use GithubService\Hydrator\HydratorException;

class HydratorRegistry
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
        throw new HydratorException("Missing key '$keyName' in data ".var_export($data, true));
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
                    throw new HydratorException(
                        "Missing key '$keyName' in data ".var_export($data, true)
                    );
                }
            }

            $loopData = $loopData[$keyName];
        }

        return $loopData;
    }
    

    public function instantiateClass($classname, $data)
    {
        if (array_key_exists($classname, $this->hydrators) === false) {
            throw new HydratorException("Cannot instantiate - unregistered class $classname");
        }

        $hydrator = $this->hydrators[$classname];
        $instance = $hydrator->hydrate($data, $this);

        return $instance;
    }
}