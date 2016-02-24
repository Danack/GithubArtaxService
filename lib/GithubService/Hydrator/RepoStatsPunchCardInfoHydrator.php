<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsPunchCardInfo;

class RepoStatsPunchCardInfoHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $punchCardInfo = new RepoStatsPunchCardInfo();
        $punchCardInfo->day = $hydratorRegistry->extractValue($data, 0);
        $punchCardInfo->hour = $hydratorRegistry->extractValue($data, 1);
        $punchCardInfo->numberCommits = $hydratorRegistry->extractValue($data, 2);

        return $punchCardInfo;
    }
}
