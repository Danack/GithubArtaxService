<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\EmailSearchResults;



class EmailSearchResultsHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $emailSearchResults = new EmailSearchResults();
        foreach ($data as $key => $value) {
            $user = $dataMapper->extractValue($data, 'user');
            $emailSearchResults->user = $dataMapper->instantiateClass(
                'GithubService\\Model\\UserInSearchResult',
                $user
            );
        }

        return $emailSearchResults;
    }
}
