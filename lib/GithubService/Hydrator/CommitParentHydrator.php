<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\CommitParent;

class CommitParentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new CommitParent();
        $commitInfo->url = $hydratorRegistry->extractValue($data, 'url');
        $commitInfo->sha = $hydratorRegistry->extractValue($data, 'sha');

        return $commitInfo;
    }
}
