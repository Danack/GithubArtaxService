<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Blob;

class BlobHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blob = new Blob();
        $blob->content = $dataMapper->extractValue($data, 'content');
        $blob->encoding = $dataMapper->extractValue($data, 'encoding');
        $blob->sha = $dataMapper->extractValue($data, 'sha');
        $blob->size = $dataMapper->extractValue($data, 'size');
        $blob->url = $dataMapper->extractValue($data, 'url');

        
        return $blob;
    }
}
