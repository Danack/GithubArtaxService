<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\SimplePublicKey;


class SimplePublicKeyHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $simplePublicKey = new SimplePublicKey();
        $simplePublicKey->id = $dataMapper->extractValue($data, 'id');
        $simplePublicKey->key = $dataMapper->extractValue($data, 'key');

        return $simplePublicKey;
    }
}
