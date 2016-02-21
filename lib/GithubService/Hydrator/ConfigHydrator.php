<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Config;

class ConfigHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $config = new Config();
        $config->contentType = $dataMapper->extractValue($data, 'content_type');
        $config->url = $dataMapper->extractValue($data, 'url');

        return $config;
    }
}
