<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\GistFork;
use GithubService\Model\GistForks;




class GistForksHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $gistForks = new GistForks();
        foreach ($data as $entry) {
            $gistForks->gistForklist[] = $dataMapper->instantiate('GithubService\Model\GistFork', $entry);  
        }
 
        return $gistForks;
    }
}
