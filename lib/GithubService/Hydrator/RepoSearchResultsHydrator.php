<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoSearchResults;




class RepoSearchResultsHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $branches = new RepoSearchResults();
        $repositories = $dataMapper->extractValue($data, 'repositories');
        $object = $dataMapper->instantiate('GithubService\Model\Repositories', $repositories);
        $branches->repositories = $object;

        return $branches;
    }
}
