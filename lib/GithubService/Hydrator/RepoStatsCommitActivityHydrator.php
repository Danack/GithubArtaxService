<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsCommitActivity;

class RepoStatsCommitActivityHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoStatsCommitActivity = new RepoStatsCommitActivity();
        foreach ($data as $entry) {
            $child = $hydratorRegistry->instantiateClass('GithubService\Model\RepoStatsCommitActivityChild', $entry);
            $repoStatsCommitActivity->repoStats[] = $child;
        }

        return $repoStatsCommitActivity;
    }
}
