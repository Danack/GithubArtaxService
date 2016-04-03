<?php


namespace GithubService\Hydrator;


use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\SearchRepos;

class SearchReposHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoSubscription = new SearchRepos();
        $repoSubscription->totalCount = $hydratorRegistry->extractValue($data, 'total_count');
        $repoSubscription->incompleteResults = $hydratorRegistry->extractValue($data, 'incomplete_results');

        $repositories = $hydratorRegistry->extractValue($data, 'items');
        
        foreach ($repositories as $repository) {

            $repoSubscription->repoList[] = $hydratorRegistry->instantiateClass(
                'GithubService\Model\SearchRepoItem',
                $repository
            );
        }

        return $repoSubscription;
    }
}

