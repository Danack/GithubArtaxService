<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\SimplePublicKey;


class SimplePublicKeyHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $simplePublicKey = new SimplePublicKey();
        $simplePublicKey->id = $hydratorRegistry->extractValue($data, 'id');
        $simplePublicKey->key = $hydratorRegistry->extractValue($data, 'key');

        return $simplePublicKey;
    }
}
