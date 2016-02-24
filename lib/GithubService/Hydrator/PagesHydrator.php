<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Pages;

class PagesHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $blob = new Pages();
        $blob->cname = $hydratorRegistry->extractValue($data, 'cname');
        $blob->custom404 = $hydratorRegistry->extractValue($data, 'custom_404');
        $blob->status = $hydratorRegistry->extractValue($data, 'status');
        $blob->url = $hydratorRegistry->extractValue($data, 'url');

        return $blob;
    }
}
