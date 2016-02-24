<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\EmailSearchResults;



class EmailSearchResultsHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $emailSearchResults = new EmailSearchResults();
        foreach ($data as $key => $value) {
            $user = $hydratorRegistry->extractValue($data, 'user');
            $emailSearchResults->user = $hydratorRegistry->instantiateClass(
                'GithubService\\Model\\UserInSearchResult',
                $user
            );
        }

        return $emailSearchResults;
    }
}
