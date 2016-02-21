<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\IndexingSuccess;



class IndexingSuccessHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $payload = new IndexingSuccess();
        $payload->message = $dataMapper->extractValue($data, 'message');

        return $payload;
    }
}
