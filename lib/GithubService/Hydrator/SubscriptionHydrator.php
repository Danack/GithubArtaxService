<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Subscription;


class SubscriptionHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $subscription = new Subscription();
        $subscription->createdAt = $dataMapper->extractValue($data, 'created_at');
        $subscription->ignored = $dataMapper->extractValue($data, 'ignored');
        $subscription->reason = $dataMapper->extractValue($data, 'reason');
        $subscription->subscribed = $dataMapper->extractValue($data, 'subscribed');
        $subscription->thread_url = $dataMapper->extractValue($data, 'thread_url');
        $subscription->url = $dataMapper->extractValue($data, 'url');

        return $subscription;
    }
}
