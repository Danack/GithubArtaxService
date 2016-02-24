<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Status;

class StatusHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $status = new Status();
        $status->context = $hydratorRegistry->extractValue($data, 'context');
        $status->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $status->description = $hydratorRegistry->extractValue($data, 'description');
        $status->id = $hydratorRegistry->extractValue($data, 'id');
        $status->state = $hydratorRegistry->extractValue($data, 'state');
        $status->targetUrl = $hydratorRegistry->extractValue($data, 'target_url');
        $status->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $status->url = $hydratorRegistry->extractValue($data, 'url');

        $creator = $hydratorRegistry->extractValue($data, 'creator', true);
        if ($creator !== null) {
            $status->creator = $hydratorRegistry->instantiateClass('GithubService\\Model\\User', $creator);
        }
        
        return $status;
    }
}
