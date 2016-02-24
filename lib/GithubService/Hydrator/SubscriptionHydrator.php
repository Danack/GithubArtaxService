<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Subscription;


class SubscriptionHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $subscription = new Subscription();
        $subscription->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $subscription->ignored = $hydratorRegistry->extractValue($data, 'ignored');
        $subscription->reason = $hydratorRegistry->extractValue($data, 'reason');
        $subscription->subscribed = $hydratorRegistry->extractValue($data, 'subscribed');
        $subscription->threadUrl = $hydratorRegistry->extractValue($data, 'thread_url');
        $subscription->url = $hydratorRegistry->extractValue($data, 'url');

        return $subscription;
    }
}
