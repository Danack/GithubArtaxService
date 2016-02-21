<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Pages;

class PagesHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blob = new Pages();
        $blob->cname = $dataMapper->extractValue($data, 'cname');
        $blob->custom404 = $dataMapper->extractValue($data, 'custom_404');
        $blob->status = $dataMapper->extractValue($data, 'status');
        $blob->url = $dataMapper->extractValue($data, 'url');

        return $blob;
    }
}
