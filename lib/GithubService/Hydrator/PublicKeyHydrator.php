<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\PublicKey;

class PublicKeyHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $publicKey = new PublicKey();
        $publicKey->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $publicKey->id = $hydratorRegistry->extractValue($data, 'id');
        $publicKey->key = $hydratorRegistry->extractValue($data, 'key');
        $publicKey->title = $hydratorRegistry->extractValue($data, 'title');
        $publicKey->url = $hydratorRegistry->extractValue($data, 'url');
        $publicKey->verified = $hydratorRegistry->extractValue($data, 'verified');

        return $publicKey;
    }
}
