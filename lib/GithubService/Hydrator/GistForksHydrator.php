<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\GistFork;
use GithubService\Model\GistForks;




class GistForksHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $gistForks = new GistForks();
        foreach ($data as $entry) {
            $gistForks->gistForklist[] = $hydratorRegistry->instantiateClass('GithubService\Model\GistFork', $entry);  
        }
 
        return $gistForks;
    }
}
