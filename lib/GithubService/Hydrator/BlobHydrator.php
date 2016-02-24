<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Blob;

class BlobHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $blob = new Blob();
        $blob->content = $hydratorRegistry->extractValue($data, 'content');
        $blob->encoding = $hydratorRegistry->extractValue($data, 'encoding');
        $blob->sha = $hydratorRegistry->extractValue($data, 'sha');
        $blob->size = $hydratorRegistry->extractValue($data, 'size');
        $blob->url = $hydratorRegistry->extractValue($data, 'url');

        
        return $blob;
    }
}
