<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\PagesBuild;

class PagesBuildHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $payload = new PagesBuild();
        $payload->commit = $hydratorRegistry->extractValue($data, 'commit');
        $payload->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $payload->duration = $hydratorRegistry->extractValue($data, 'duration');
        $payload->status = $hydratorRegistry->extractValue($data, 'status');
        $payload->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $payload->url = $hydratorRegistry->extractValue($data, 'url');

        
        $error = $hydratorRegistry->extractValue($data, 'error');
        $payload->error = $hydratorRegistry->instantiateClass('GithubService\Model\IndexingSuccess', $error);
        
        $pusher = $hydratorRegistry->extractValue($data, 'pusher');
        $payload->pusher = $hydratorRegistry->instantiateClass('GithubService\Model\User', $pusher);

        return $payload;
    }
}
