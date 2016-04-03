<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\AccessResponse;


class AccessResponseHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $accessResponse = new AccessResponse();
        $accessResponse->accessToken = $hydratorRegistry->extractValue($data, 'access_token');
        $accessResponse->scope = $hydratorRegistry->extractValue($data, 'scope');
        $accessResponse->tokenType = $hydratorRegistry->extractValue($data, 'token_type');
        
        return $accessResponse;
    }
}
