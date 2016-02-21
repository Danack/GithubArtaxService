<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RefObject;

class RefObjectHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new RefObject();
        $commitInfo->sha = $dataMapper->extractValue($data, 'sha');
        $commitInfo->type = $dataMapper->extractValue($data, 'type');
        $commitInfo->url = $dataMapper->extractValue($data, 'url');

        return $commitInfo;
    }
}
