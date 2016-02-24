<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\OauthAccess;

class OauthAccessHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $oauthAccess = new OauthAccess();
        $oauthAccess->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $oauthAccess->fingerprint = $hydratorRegistry->extractValue($data, 'fingerprint', true);
        $oauthAccess->hashedToken = $hydratorRegistry->extractValue($data, 'hashed_token', true);
        $oauthAccess->id = $hydratorRegistry->extractValue($data, 'id');
        $oauthAccess->note = $hydratorRegistry->extractValue($data, 'note');
        $oauthAccess->noteUrl = $hydratorRegistry->extractValue($data, 'note_url');
        $oauthAccess->token = $hydratorRegistry->extractValue($data, 'token');
        $oauthAccess->tokenLastEight = $hydratorRegistry->extractValue($data, 'token_last_eight', true);
        $oauthAccess->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $oauthAccess->url = $hydratorRegistry->extractValue($data, 'url');
        $app = $hydratorRegistry->extractValue($data, 'app');
        $oauthAccess->app = $hydratorRegistry->instantiateClass('GithubService\Model\App', $app);
        //TODO - check is array of values
        $oauthAccess->scopes = $hydratorRegistry->extractValue($data, 'scopes');

        return $oauthAccess;
    }
}
