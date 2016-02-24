<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Person;

class PersonHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $app = new Person();
        $app->login = $hydratorRegistry->extractValue($data, 'login');
        $app->id = $hydratorRegistry->extractValue($data, 'id');
        $app->avatarURL = $hydratorRegistry->extractValue($data, 'avatar_url');
        $app->gravatarID = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $app->url = $hydratorRegistry->extractValue($data, 'url');
        $app->followersURL = $hydratorRegistry->extractValue($data, 'followers_url', true);
        $app->followingURL = $hydratorRegistry->extractValue($data, 'following_url', true);
        $app->gistsURL = $hydratorRegistry->extractValue($data, 'gists_url', true);
        $app->starredURL = $hydratorRegistry->extractValue($data, 'starred_url', true);
        $app->organizationsURL = $hydratorRegistry->extractValue($data, 'organizations_url', true);
        $app->reposURL = $hydratorRegistry->extractValue($data, 'repos_url', true);
        $app->eventsURL = $hydratorRegistry->extractValue($data, 'events_url', true);
        $app->receivedEventsURL = $hydratorRegistry->extractValue($data, 'received_events_url', true);
        $app->type = $hydratorRegistry->extractValue($data, 'type', true);
        $app->siteAdmin = $hydratorRegistry->extractValue($data, 'site_admin', true);

        return $app;
    }
}
