<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\OauthAccessList;



class OauthAccessListHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $oauthAccessList = new OauthAccessList();
        foreach ($data as $entry) {
            $oauth = $dataMapper->instantiateClass('GithubService\Model\OauthAccess', $entry);
            $oauthAccessList->accessList[] = $oauth;
        }

        return $oauthAccessList;
    }
}
