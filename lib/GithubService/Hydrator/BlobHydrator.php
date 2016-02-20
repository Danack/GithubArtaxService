<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;

use GithubService\Model\Blob;

class BlobHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blob = new Blob();
        $blob->content = $data['content'];
        $blob->encoding = $data['encoding'];
        $blob->sha = $data['sha'];
        $blob->size = $data['size'];
        $blob->url = $data['url'];


        return $blob;
    }
}
