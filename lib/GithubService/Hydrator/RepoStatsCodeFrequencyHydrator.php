<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsCodeFrequency;

class RepoStatsCodeFrequencyHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoStatsCodeInfo = new RepoStatsCodeFrequency();

        foreach ($data as $entry) {
            $codeInfo = $hydratorRegistry->instantiateClass('GithubService\Model\RepoStatsCodeInfo', $entry);
            $repoStatsCodeInfo->repoStats[] = $codeInfo; 
        }

        return $repoStatsCodeInfo;
    }
}
