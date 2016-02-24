<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Meta;


class MetaHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $meta = new Meta();
        $meta->githubServicesSha = $hydratorRegistry->extractValue($data, 'github_services_sha');
        $meta->verifiablePasswordAuthentication = $hydratorRegistry->extractValue($data, 'verifiable_password_authentication');
        $git = $hydratorRegistry->extractValue($data, 'git');
        //TODO - check valid array
        $meta->git = $git;
        
        $hooks = $hydratorRegistry->extractValue($data, 'hooks');
        //TODO - check valid array
        $meta->hooks = $hooks;

        return $meta;
    }
}
