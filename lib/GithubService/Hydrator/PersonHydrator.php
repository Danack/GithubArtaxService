<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Person;



class PersonHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $app = new Person();
        $app->login = $dataMapper->extractValue($data, 'login');
        $app->id = $dataMapper->extractValue($data, 'id');
        $app->avatarURL = $dataMapper->extractValue($data, 'avatar_url');
        $app->gravatarID = $dataMapper->extractValue($data, 'gravatar_id');
        $app->url = $dataMapper->extractValue($data, 'url');
        $app->followersURL = $dataMapper->extractValue($data, 'followers_url', true);
        $app->followingURL = $dataMapper->extractValue($data, 'following_url', true);
        $app->gistsURL = $dataMapper->extractValue($data, 'gists_url', true);
        $app->starredURL = $dataMapper->extractValue($data, 'starred_url', true);
        $app->organizationsURL = $dataMapper->extractValue($data, 'organizations_url', true);
        $app->reposURL = $dataMapper->extractValue($data, 'repos_url', true);
        $app->eventsURL = $dataMapper->extractValue($data, 'events_url', true);
        $app->receivedEventsURL = $dataMapper->extractValue($data, 'received_events_url', true);
        $app->type = $dataMapper->extractValue($data, 'type', true);
        $app->siteAdmin = $dataMapper->extractValue($data, 'site_admin', true);

        return $app;
    }
}
