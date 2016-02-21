<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\OauthAccess;

class OauthAccessHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $oauthAccess = new OauthAccess();
        $oauthAccess->createdAt = $dataMapper->extractValue($data, 'created_at');
        $oauthAccess->fingerprint = $dataMapper->extractValue($data, 'fingerprint', true);
        $oauthAccess->hashedToken = $dataMapper->extractValue($data, 'hashed_token', true);
        $oauthAccess->id = $dataMapper->extractValue($data, 'id');
        $oauthAccess->note = $dataMapper->extractValue($data, 'note');
        $oauthAccess->noteUrl = $dataMapper->extractValue($data, 'note_url');
        $oauthAccess->token = $dataMapper->extractValue($data, 'token');
        $oauthAccess->tokenLastEight = $dataMapper->extractValue($data, 'token_last_eight', true);
        $oauthAccess->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $oauthAccess->url = $dataMapper->extractValue($data, 'url');
        $app = $dataMapper->extractValue($data, 'app');
        $oauthAccess->app = $dataMapper->instantiate('GithubService\Model\App', $app);
        //TODO - check is array of values
        $oauthAccess->scopes = $dataMapper->extractValue($data, 'scopes');

        return $oauthAccess;
    }
}
