<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Meta;


class MetaHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $meta = new Meta();
        $meta->githubServicesSha = $dataMapper->extractValue($data, 'github_services_sha');
        $meta->verifiablePasswordAuthentication = $dataMapper->extractValue($data, 'verifiable_password_authentication');
        $git = $dataMapper->extractValue($data, 'git');
        //TODO - check valid array
        $meta->git = $git;
        
        $hooks = $dataMapper->extractValue($data, 'hooks');
        //TODO - check valid array
        $meta->hooks = $hooks;

        return $meta;
    }
}
