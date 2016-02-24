<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\OauthAccessList;

class OauthAccessListHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $oauthAccessList = new OauthAccessList();
        foreach ($data as $entry) {
            $oauth = $hydratorRegistry->instantiateClass('GithubService\Model\OauthAccess', $entry);
            $oauthAccessList->accessList[] = $oauth;
        }

        return $oauthAccessList;
    }
}
