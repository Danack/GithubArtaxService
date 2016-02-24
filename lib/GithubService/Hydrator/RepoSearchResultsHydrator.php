<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoSearchResults;


class RepoSearchResultsHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $branches = new RepoSearchResults();
        $repositories = $hydratorRegistry->extractValue($data, 'repositories');
        $object = $hydratorRegistry->instantiateClass('GithubService\Model\Repositories', $repositories);
        $branches->repositories = $object;

        return $branches;
    }
}
