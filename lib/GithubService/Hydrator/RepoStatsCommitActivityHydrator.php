<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\RepoStatsCommitActivity;

class RepoStatsCommitActivityHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoStatsCommitActivity = new RepoStatsCommitActivity();
        foreach ($data as $entry) {
            $child = $dataMapper->instantiateClass('GithubService\Model\RepoStatsCommitActivityChild', $entry);
            $repoStatsCommitActivity->repoStats[] = $child;
        }

        return $repoStatsCommitActivity;
    }
}
