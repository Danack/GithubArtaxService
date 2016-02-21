<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoStatsCodeInfo;

class RepoStatsCodeInfoHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoStatsCodeInfo = new RepoStatsCodeInfo();
        $repoStatsCodeInfo->startOfWeek = $dataMapper->extractValue($data, 0);
        $repoStatsCodeInfo->additions = $dataMapper->extractValue($data, 1);
        $repoStatsCodeInfo->deletions = $dataMapper->extractValue($data, 1);

        return $repoStatsCodeInfo;
    }
}
