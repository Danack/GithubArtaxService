<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\GistFork;







class GistForkHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $ref = new GistFork();

        $ref->createdAt = $dataMapper->extractValue($data, 'created_at');
        $ref->id = $dataMapper->extractValue($data, 'id');
        $ref->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $ref->url = $dataMapper->extractValue($data, 'url');
        
        $user = $dataMapper->extractValue($data, 'user');
        $ref->refObject = $dataMapper->instantiate('GithubService\Model\User', $user);

        return $ref;
    }
}
