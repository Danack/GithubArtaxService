<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoSearchItem;



class RepoSearchItemHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoSearchItem = new RepoSearchItem();
        $repoSearchItem->created = $dataMapper->extractValue($data, 'created');
        $repoSearchItem->createdAt = $dataMapper->extractValue($data, 'created_at');
        $repoSearchItem->description = $dataMapper->extractValue($data, 'description');
        $repoSearchItem->followers = $dataMapper->extractValue($data, 'followers');
        $repoSearchItem->fork = $dataMapper->extractValue($data, 'fork');
        $repoSearchItem->forks = $dataMapper->extractValue($data, 'forks');
        $repoSearchItem->hasDownloads = $dataMapper->extractValue($data, 'has_downloads');
        $repoSearchItem->hasIssues = $dataMapper->extractValue($data, 'has_issues');
        $repoSearchItem->hasWiki = $dataMapper->extractValue($data, 'has_wiki');
        $repoSearchItem->homepage = $dataMapper->extractValue($data, 'homepage');
        $repoSearchItem->language = $dataMapper->extractValue($data, 'language');
        $repoSearchItem->name = $dataMapper->extractValue($data, 'name');
        $repoSearchItem->openIssues = $dataMapper->extractValue($data, 'open_issues');
        $repoSearchItem->owner = $dataMapper->extractValue($data, 'owner');
        $repoSearchItem->private = $dataMapper->extractValue($data, 'private');
        $repoSearchItem->pushed = $dataMapper->extractValue($data, 'pushed');
        $repoSearchItem->pushedAt = $dataMapper->extractValue($data, 'pushed_at');
        $repoSearchItem->score = $dataMapper->extractValue($data, 'score');
        $repoSearchItem->size = $dataMapper->extractValue($data, 'size');
        $repoSearchItem->type = $dataMapper->extractValue($data, 'type');
        $repoSearchItem->url = $dataMapper->extractValue($data, 'url');
        $repoSearchItem->username = $dataMapper->extractValue($data, 'username');
        $repoSearchItem->watchers = $dataMapper->extractValue($data, 'watchers');

        return $repoSearchItem;
    }
}
