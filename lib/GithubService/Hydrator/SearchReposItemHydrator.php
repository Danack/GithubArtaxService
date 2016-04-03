<?php


namespace GithubService\Hydrator;


use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\SearchRepoItem;

use GithubService\Model\OwnerSearch;

class SearchReposItemHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $searchRepoItem = new SearchRepoItem();
        $searchRepoItem->created = $hydratorRegistry->extractValue($data, 'created', true);
        $searchRepoItem->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $searchRepoItem->description = $hydratorRegistry->extractValue($data, 'description');
        $searchRepoItem->followers = $hydratorRegistry->extractValue($data, 'followers', true);
        $searchRepoItem->fork = $hydratorRegistry->extractValue($data, 'fork');
        $searchRepoItem->forksCount = $hydratorRegistry->extractValue($data, 'forks_count');
        $searchRepoItem->homepage = $hydratorRegistry->extractValue($data, 'homepage');
        $searchRepoItem->language = $hydratorRegistry->extractValue($data, 'language');
        $searchRepoItem->name = $hydratorRegistry->extractValue($data, 'name');
        $entry = $hydratorRegistry->extractValue($data, 'owner');
        $searchRepoItem->owner = $hydratorRegistry->instantiateClass(OwnerSearch::class, $entry);
        $searchRepoItem->private = $hydratorRegistry->extractValue($data, 'private');
        $searchRepoItem->pushedAt = $hydratorRegistry->extractValue($data, 'pushed_at');
        $searchRepoItem->score = $hydratorRegistry->extractValue($data, 'score');
        $searchRepoItem->size = $hydratorRegistry->extractValue($data, 'size');
        $searchRepoItem->url = $hydratorRegistry->extractValue($data, 'url');
        $searchRepoItem->stargazersCount = $hydratorRegistry->extractValue($data, 'stargazers_count');
        $searchRepoItem->watchersCount = $hydratorRegistry->extractValue($data, 'watchers_count');

        return $searchRepoItem;
    }
}

