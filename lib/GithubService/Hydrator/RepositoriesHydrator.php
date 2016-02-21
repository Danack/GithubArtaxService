<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Repositories;




class RepositoriesHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repositories = new Repositories();
        
        foreach ($data as $entry) {
            $object = $dataMapper->instantiateClass('GithubService\Model\RepoSearchItem', $entry);
            $repositories->repositoriesChild[] = $object;
        }

        return $repositories;
    }
}
