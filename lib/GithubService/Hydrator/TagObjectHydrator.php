<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\TagObject;

class TagObjectHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $tagObject = new TagObject();
        $tagObject->url = $hydratorRegistry->extractValue($data, 'url');
        $tagObject->sha = $hydratorRegistry->extractValue($data, 'sha');
        $tagObject->type = $hydratorRegistry->extractValue($data, 'type');

        return $tagObject;
    }
}
