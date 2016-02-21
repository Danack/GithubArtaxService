<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\CommitParent;

class CommitParentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new CommitParent();
        $commitInfo->url = $dataMapper->extractValue($data, 'url');
        $commitInfo->sha = $dataMapper->extractValue($data, 'sha');

        return $commitInfo;
    }
}
