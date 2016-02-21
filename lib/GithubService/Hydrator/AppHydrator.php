<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\App;


class AppHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $app = new App();
        $app->clientId = $dataMapper->extractValue($data, 'client_id');
        $app->name = $dataMapper->extractValue($data, 'name');
        $app->url = $dataMapper->extractValue($data, 'url');

        return $app;
    }
}
