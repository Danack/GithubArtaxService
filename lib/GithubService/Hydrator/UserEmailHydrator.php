<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\UserEmail;

class UserEmailHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new UserEmail();
        $commitInfo->email = $hydratorRegistry->extractValue($data, 'email');
        $commitInfo->primary = $hydratorRegistry->extractValue($data, 'primary');
        $commitInfo->verified = $hydratorRegistry->extractValue($data, 'verified');

        return $commitInfo;
    }
}
