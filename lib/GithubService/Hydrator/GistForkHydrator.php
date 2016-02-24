<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\GistFork;

class GistForkHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $ref = new GistFork();

        $ref->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $ref->id = $hydratorRegistry->extractValue($data, 'id');
        $ref->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $ref->url = $hydratorRegistry->extractValue($data, 'url');
        $user = $hydratorRegistry->extractValue($data, 'user');
        $ref->user = $hydratorRegistry->instantiateClass('GithubService\Model\User', $user);

        return $ref;
    }
}
