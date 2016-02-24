<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsCodeInfo;

class RepoStatsCodeInfoHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoStatsCodeInfo = new RepoStatsCodeInfo();
        $repoStatsCodeInfo->startOfWeek = $hydratorRegistry->extractValue($data, 0);
        $repoStatsCodeInfo->additions = $hydratorRegistry->extractValue($data, 1);
        $repoStatsCodeInfo->deletions = $hydratorRegistry->extractValue($data, 1);

        return $repoStatsCodeInfo;
    }
}
