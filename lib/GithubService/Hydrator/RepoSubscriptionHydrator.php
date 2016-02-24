<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\RepoSubscription;

class RepoSubscriptionHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoSubscription = new RepoSubscription();
        $repoSubscription->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $repoSubscription->ignored = $hydratorRegistry->extractValue($data, 'ignored');
        $repoSubscription->reason = $hydratorRegistry->extractValue($data, 'reason');
        $repoSubscription->repositoryUrl = $hydratorRegistry->extractValue($data, 'repository_url');
        $repoSubscription->subscribed = $hydratorRegistry->extractValue($data, 'subscribed');
        $repoSubscription->url = $hydratorRegistry->extractValue($data, 'url');

        return $repoSubscription;
    }
}
