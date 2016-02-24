<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Config;

class ConfigHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $config = new Config();
        $config->contentType = $hydratorRegistry->extractValue($data, 'content_type');
        $config->url = $hydratorRegistry->extractValue($data, 'url');

        return $config;
    }
}
