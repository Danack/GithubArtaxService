<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoStatsCodeFrequency;

class RepoStatsCodeFrequencyHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoStatsCodeInfo = new RepoStatsCodeFrequency();

        foreach ($data as $entry) {
            $codeInfo = $dataMapper->instantiate('GithubService\Model\RepoStatsCodeInfo', $entry);
            $repoStatsCodeInfo->repoStats[] = $codeInfo; 
        }

        return $repoStatsCodeInfo;
    }
}
