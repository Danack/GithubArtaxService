<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\RepoSubscription;

class RepoSubscriptionHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoSubscription = new RepoSubscription();
        $repoSubscription->createdAt = $dataMapper->extractValue($data, 'created_at');
        $repoSubscription->ignored = $dataMapper->extractValue($data, 'ignored');
        $repoSubscription->reason = $dataMapper->extractValue($data, 'reason');
        $repoSubscription->repositoryUrl = $dataMapper->extractValue($data, 'repository_url');
        $repoSubscription->subscribed = $dataMapper->extractValue($data, 'subscribed');
        $repoSubscription->url = $dataMapper->extractValue($data, 'url');

        return $repoSubscription;
    }
}
