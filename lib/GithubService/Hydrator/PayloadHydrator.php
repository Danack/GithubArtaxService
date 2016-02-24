<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Payload;

class PayloadHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $payload = new Payload();
        $payload->task = $hydratorRegistry->extractValue($data, 'task');

        return $payload;
    }
}
