<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Refs;

class RefsHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $ref = new Refs();
        foreach ($data as $refData) {
            $ref->refs[] = $hydratorRegistry->instantiateClass('GithubService\Model\Ref', $refData);
        }

        return $ref;
    }
}
