<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoStatsPunchCard;



class RepoStatsPunchCardHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoStatsPunchCard = new RepoStatsPunchCard();
        foreach ($data as $entry) {
            $newEntry = $dataMapper->instantiateClass('GithubService\\Model\\RepoStatsPunchCardInfo', $entry);
            $repoStatsPunchCard->entries[] = $newEntry; 
        }

        return $repoStatsPunchCard;
    }
}
