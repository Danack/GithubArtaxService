<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Payload;

class PayloadHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $payload = new Payload();
        $payload->task = $dataMapper->extractValue($data, 'task');

        return $payload;
    }
}
