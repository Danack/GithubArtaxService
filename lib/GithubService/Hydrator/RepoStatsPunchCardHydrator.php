<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoStatsPunchCard;



class RepoStatsPunchCardHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoStatsPunchCard = new RepoStatsPunchCard();
        foreach ($data as $entry) {
            $newEntry = $hydratorRegistry->instantiateClass('GithubService\\Model\\RepoStatsPunchCardInfo', $entry);
            $repoStatsPunchCard->entries[] = $newEntry; 
        }

        return $repoStatsPunchCard;
    }
}
