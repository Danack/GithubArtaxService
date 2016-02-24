<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\App;


class AppHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $app = new App();
        $app->clientId = $hydratorRegistry->extractValue($data, 'client_id');
        $app->name = $hydratorRegistry->extractValue($data, 'name');
        $app->url = $hydratorRegistry->extractValue($data, 'url');

        return $app;
    }
}
