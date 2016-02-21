<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Status;

class StatusHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $status = new Status();
        $status->context = $dataMapper->extractValue($data, 'context');
        $status->createdAt = $dataMapper->extractValue($data, 'created_at');
        $status->description = $dataMapper->extractValue($data, 'description');
        $status->id = $dataMapper->extractValue($data, 'id');
        $status->state = $dataMapper->extractValue($data, 'state');
        $status->targetUrl = $dataMapper->extractValue($data, 'target_url');
        $status->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $status->url = $dataMapper->extractValue($data, 'url');

        $creator = $dataMapper->extractValue($data, 'creator', true);
        if ($creator !== null) {
            $status->creator = $dataMapper->instantiateClass('GithubService\\Model\\User', $creator);
        }
        
        return $status;
    }
}
