<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\IndexingSuccess;



class IndexingSuccessHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $payload = new IndexingSuccess();
        $payload->message = $hydratorRegistry->extractValue($data, 'message');

        return $payload;
    }
}
