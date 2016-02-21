<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoStatsPunchCardInfo;

class RepoStatsPunchCardInfoHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $punchCardInfo = new RepoStatsPunchCardInfo();
        $punchCardInfo->day = $dataMapper->extractValue($data, 0);
        $punchCardInfo->hour = $dataMapper->extractValue($data, 1);
        $punchCardInfo->numberCommits = $dataMapper->extractValue($data, 2);

        return $punchCardInfo;
    }
}
