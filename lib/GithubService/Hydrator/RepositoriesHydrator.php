<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Repositories;


class RepositoriesHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repositories = new Repositories();
        
        foreach ($data as $entry) {
            $object = $hydratorRegistry->instantiateClass('GithubService\Model\RepoSearchItem', $entry);
            $repositories->repositoriesChild[] = $object;
        }

        return $repositories;
    }
}
