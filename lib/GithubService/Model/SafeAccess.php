<?php

namespace GithubService\Model;

trait SafeAccess
{
    public function __set($name, $value)
    {
        throw new \Exception("Property [$name] doesn't exist for class [".get_class($this)."] so can't set it");
    }
    
    public function __get($name)
    {
        throw new \Exception("Property [$name] doesn't exist for class [".get_class($this)."] so can't get it");
    }

    function __call($name, array $arguments)
    {
        throw new \Exception("Function [$name] doesn't exist for class [".get_class($this)."] so can't call it");
    }
}




