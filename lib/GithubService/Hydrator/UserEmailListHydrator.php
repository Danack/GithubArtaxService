<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\UserEmailList;

class UserEmailListHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $userEmailList = new UserEmailList();
        $userEmailList->emails = [];
        foreach ($data as $entry) {
            $userEmailList->emails[] = $hydratorRegistry->instantiateClass('GithubService\Model\UserEmail', $entry);
        }

        return $userEmailList;
    }
}
