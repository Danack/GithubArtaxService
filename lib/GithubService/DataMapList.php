<?php


namespace GithubService;

class DataMapList implements \IteratorAggregate
{
    public $dataMap = [];
    
    public static function fromMappingArray($dataMappingArray)
    {
        $instance = new self();
        foreach ($dataMappingArray as $dataMapping) {
            $instance->dataMap[] = DataMap::fromMappingArray($dataMapping);
        }

        return $instance;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->dataMap);
    }
}
