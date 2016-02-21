<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\PublicKey;

class PublicKeyHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $publicKey = new PublicKey();
        $publicKey->createdAt = $dataMapper->extractValue($data, 'created_at');
        $publicKey->id = $dataMapper->extractValue($data, 'id');
        $publicKey->key = $dataMapper->extractValue($data, 'key');
        $publicKey->title = $dataMapper->extractValue($data, 'title');
        $publicKey->url = $dataMapper->extractValue($data, 'url');
        $publicKey->verified = $dataMapper->extractValue($data, 'verified');

        return $publicKey;
    }
}
