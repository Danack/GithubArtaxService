<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Deployment;

class DeploymentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $deployment = new Deployment();
        $deployment->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $deployment->description = $hydratorRegistry->extractValue($data, 'description');
        $deployment->environment = $hydratorRegistry->extractValue($data, 'environment');
        $deployment->id = $hydratorRegistry->extractValue($data, 'id');
        $deployment->ref = $hydratorRegistry->extractValue($data, 'ref');
        $deployment->sha = $hydratorRegistry->extractValue($data, 'sha');
        $deployment->statusesUrl = $hydratorRegistry->extractValue($data, 'statuses_url');
        $deployment->task = $hydratorRegistry->extractValue($data, 'task');
        $deployment->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $deployment->url = $hydratorRegistry->extractValue($data, 'url');
        
        $creator = $hydratorRegistry->extractValue($data, 'creator');
        $deployment->creator = $hydratorRegistry->instantiateClass('GithubService\\Model\\User', $creator);
        
        $payload = $hydratorRegistry->extractValue($data, 'payload');
        $deployment->payload = $hydratorRegistry->instantiateClass('GithubService\\Model\\Payload', $payload);


        return $deployment;
    }
}
