<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\User;

class UserHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new User();
        $commitInfo->avatarUrl = $hydratorRegistry->extractValue($data, 'avatar_url');
        $commitInfo->eventsUrl = $hydratorRegistry->extractValue($data, 'events_url');
        $commitInfo->followersUrl = $hydratorRegistry->extractValue($data, 'followers_url');
        $commitInfo->followingUrl = $hydratorRegistry->extractValue($data, 'following_url');
        $commitInfo->gistsUrl = $hydratorRegistry->extractValue($data, 'gists_url');
        $commitInfo->gravatarId = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $commitInfo->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $commitInfo->id = $hydratorRegistry->extractValue($data, 'id');
        $commitInfo->login = $hydratorRegistry->extractValue($data, 'login');
        $commitInfo->organizationsUrl = $hydratorRegistry->extractValue($data, 'organizations_url');
        $commitInfo->receivedEventsUrl = $hydratorRegistry->extractValue($data, 'received_events_url');
        $commitInfo->reposUrl = $hydratorRegistry->extractValue($data, 'repos_url');
        $commitInfo->starredUrl = $hydratorRegistry->extractValue($data, 'starred_url');
        $commitInfo->subscriptionsUrl = $hydratorRegistry->extractValue($data, 'subscriptions_url');
        $commitInfo->type = $hydratorRegistry->extractValue($data, 'type');
        $commitInfo->url = $hydratorRegistry->extractValue($data, 'url');

        return $commitInfo;
    }
}
