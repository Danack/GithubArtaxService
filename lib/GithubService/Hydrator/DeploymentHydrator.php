<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Deployment;

class DeploymentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $deployment = new Deployment();
        $deployment->createdAt = $dataMapper->extractValue($data, 'created_at');
        $deployment->description = $dataMapper->extractValue($data, 'description');
        $deployment->environment = $dataMapper->extractValue($data, 'environment');
        $deployment->id = $dataMapper->extractValue($data, 'id');
        $deployment->ref = $dataMapper->extractValue($data, 'ref');
        $deployment->sha = $dataMapper->extractValue($data, 'sha');
        $deployment->statusesUrl = $dataMapper->extractValue($data, 'statuses_url');
        $deployment->task = $dataMapper->extractValue($data, 'task');
        $deployment->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $deployment->url = $dataMapper->extractValue($data, 'url');
        
        $creator = $dataMapper->extractValue($data, 'creator');
        $deployment->creator = $dataMapper->instantiate('GithubService\\Model\\User', $creator);
        
        $payload = $dataMapper->extractValue($data, 'payload');
        $deployment->payload = $dataMapper->instantiate('GithubService\\Model\\Payload', $payload);


        return $deployment;
    }
}
