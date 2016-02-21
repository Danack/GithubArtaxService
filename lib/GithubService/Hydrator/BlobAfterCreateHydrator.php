<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\BlobAfterCreate;

class BlobAfterCreateHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blobAfterCreate = new BlobAfterCreate();

        $blobAfterCreate->sha = $data['sha'];
        $blobAfterCreate->url = $data['url'];

        return $blobAfterCreate;
    }
}
