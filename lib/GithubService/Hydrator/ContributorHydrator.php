<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Contributor;


class ContributorHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $blob = new Contributor();
        $blob->avatarUrl = $hydratorRegistry->extractValue($data, 'avatar_url');
        $blob->contributions = $hydratorRegistry->extractValue($data, 'contributions');
        $blob->eventsUrl = $hydratorRegistry->extractValue($data, 'events_url');
        $blob->followersUrl = $hydratorRegistry->extractValue($data, 'followers_url');
        $blob->followingUrl = $hydratorRegistry->extractValue($data, 'following_url');
        $blob->gistsUrl = $hydratorRegistry->extractValue($data, 'gists_url');
        $blob->gravatarId = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $blob->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $blob->id = $hydratorRegistry->extractValue($data, 'id');
        $blob->login = $hydratorRegistry->extractValue($data, 'login');
        $blob->organizationsUrl = $hydratorRegistry->extractValue($data, 'organizations_url');
        $blob->receivedEventsUrl = $hydratorRegistry->extractValue($data, 'received_events_url');
        $blob->reposUrl = $hydratorRegistry->extractValue($data, 'repos_url');
        $blob->siteAdmin = $hydratorRegistry->extractValue($data, 'site_admin');
        $blob->starredUrl = $hydratorRegistry->extractValue($data, 'starred_url');
        $blob->subscriptionsUrl = $hydratorRegistry->extractValue($data, 'subscriptions_url');
        $blob->type = $hydratorRegistry->extractValue($data, 'type');
        $blob->url = $hydratorRegistry->extractValue($data, 'url');

        return $blob;
    }
}
