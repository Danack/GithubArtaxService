<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\BlobAfterCreate;

class BlobAfterCreateHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $blobAfterCreate = new BlobAfterCreate();

        $blobAfterCreate->sha = $data['sha'];
        $blobAfterCreate->url = $data['url'];

        return $blobAfterCreate;
    }
}
