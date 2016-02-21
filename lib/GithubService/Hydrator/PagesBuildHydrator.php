<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\PagesBuild;

class PagesBuildHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $payload = new PagesBuild();
        $payload->commit = $dataMapper->extractValue($data, 'commit');
        $payload->createdAt = $dataMapper->extractValue($data, 'created_at');
        $payload->duration = $dataMapper->extractValue($data, 'duration');
        $payload->status = $dataMapper->extractValue($data, 'status');
        $payload->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $payload->url = $dataMapper->extractValue($data, 'url');

        
        $error = $dataMapper->extractValue($data, 'error');
        $payload->error = $dataMapper->instantiate('GithubService\Model\IndexingSuccess', $error);
        
        $pusher = $dataMapper->extractValue($data, 'pusher');
        $payload->pusher = $dataMapper->instantiate('GithubService\Model\User', $pusher);

        return $payload;
    }
}
