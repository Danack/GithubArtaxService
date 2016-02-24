<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Ref;

class RefHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $ref = new Ref();
        $refObjectData = $hydratorRegistry->extractValue($data, 'object');
        $ref->refObject = $hydratorRegistry->instantiateClass('GithubService\Model\RefObject', $refObjectData);
        $ref->ref = $hydratorRegistry->extractValue($data, 'ref');
        $ref->url = $hydratorRegistry->extractValue($data, 'url');

        return $ref;
    }
}
