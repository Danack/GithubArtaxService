<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsCommitActivityChild;


class RepoStatsCommitActivityChildHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoStatsCommitActivity = new RepoStatsCommitActivityChild();
        
        $repoStatsCommitActivity->total = $hydratorRegistry->extractValue($data, 'total');
        $repoStatsCommitActivity->week = $hydratorRegistry->extractValue($data, 'week');

        //TODO - check is array
        $repoStatsCommitActivity->days = $hydratorRegistry->extractValue($data, 'days');


        return $repoStatsCommitActivity;
    }
}
