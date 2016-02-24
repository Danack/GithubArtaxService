<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RefObject;

class RefObjectHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new RefObject();
        $commitInfo->sha = $hydratorRegistry->extractValue($data, 'sha');
        $commitInfo->type = $hydratorRegistry->extractValue($data, 'type');
        $commitInfo->url = $hydratorRegistry->extractValue($data, 'url');

        return $commitInfo;
    }
}
