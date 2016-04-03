<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoSearchItem;

class RepoSearchItemHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoSearchItem = new RepoSearchItem();
        //$repoSearchItem->created = $hydratorRegistry->extractValue($data, 'created');
        $repoSearchItem->created = $hydratorRegistry->extractValue($data, 'created', true);
        $repoSearchItem->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $repoSearchItem->description = $hydratorRegistry->extractValue($data, 'description');
        //$repoSearchItem->followers = $hydratorRegistry->extractValue($data, 'followers');
        $repoSearchItem->followers = $hydratorRegistry->extractValue($data, 'followers', true);
        $repoSearchItem->fork = $hydratorRegistry->extractValue($data, 'fork');
        $repoSearchItem->forks = $hydratorRegistry->extractValue($data, 'forks');
        $repoSearchItem->hasDownloads = $hydratorRegistry->extractValue($data, 'has_downloads');
        $repoSearchItem->hasIssues = $hydratorRegistry->extractValue($data, 'has_issues');
        $repoSearchItem->hasWiki = $hydratorRegistry->extractValue($data, 'has_wiki');
        $repoSearchItem->homepage = $hydratorRegistry->extractValue($data, 'homepage');
        $repoSearchItem->language = $hydratorRegistry->extractValue($data, 'language');
        $repoSearchItem->name = $hydratorRegistry->extractValue($data, 'name');
        $repoSearchItem->openIssues = $hydratorRegistry->extractValue($data, 'open_issues');
        $repoSearchItem->owner = $hydratorRegistry->extractValue($data, 'owner');
        $repoSearchItem->private = $hydratorRegistry->extractValue($data, 'private');
        $repoSearchItem->pushed = $hydratorRegistry->extractValue($data, 'pushed');
        $repoSearchItem->pushedAt = $hydratorRegistry->extractValue($data, 'pushed_at');
        $repoSearchItem->score = $hydratorRegistry->extractValue($data, 'score');
        $repoSearchItem->size = $hydratorRegistry->extractValue($data, 'size');
        $repoSearchItem->type = $hydratorRegistry->extractValue($data, 'type');
        $repoSearchItem->url = $hydratorRegistry->extractValue($data, 'url');
        $repoSearchItem->username = $hydratorRegistry->extractValue($data, 'username');
        $repoSearchItem->watchers = $hydratorRegistry->extractValue($data, 'watchers');

        return $repoSearchItem;
    }
}
