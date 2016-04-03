<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\OwnerSearch;

class OwnerSearchHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        // It is unclear what fields will be available here.
        // I have erred on the side of safety, to have the minimal amount.
        $ownerSearch = new OwnerSearch();
        $ownerSearch->login = $hydratorRegistry->extractValue($data, 'login');
        $ownerSearch->id = $hydratorRegistry->extractValue($data, 'id');
        $ownerSearch->avatarURL = $hydratorRegistry->extractValue($data, 'avatar_url');
        //$ownerSearch->gravatarID = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $ownerSearch->url = $hydratorRegistry->extractValue($data, 'url');
        //$ownerSearch->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        //$ownerSearch->followersUrl = $hydratorRegistry->extractValue($data, 'followers_url');
        //$ownerSearch->followingUrl = $hydratorRegistry->extractValue($data, 'following_url');
        //$ownerSearch->gistsUrl = $hydratorRegistry->extractValue($data, 'gists_url');
        //$ownerSearch->starredUrl = $hydratorRegistry->extractValue($data, 'starred_url');
        //$ownerSearch->subscriptionsURL = $hydratorRegistry->extractValue($data, 'subscriptions_url');
        //$ownerSearch->organizationsURL = $hydratorRegistry->extractValue($data, 'organizations_url');
        //$ownerSearch->reposURL = $hydratorRegistry->extractValue($data, 'repos_url');
        //$ownerSearch->eventsURL = $hydratorRegistry->extractValue($data, 'events_url');
        $ownerSearch->receivedEventsURL  = $hydratorRegistry->extractValue($data, 'received_events_url');
        $ownerSearch->type = $hydratorRegistry->extractValue($data, 'type');
        //$ownerSearch->siteAdmin = $hydratorRegistry->extractValue($data, 'site_admin');

        return $ownerSearch;
    }
}
