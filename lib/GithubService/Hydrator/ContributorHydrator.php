<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Contributor;


class ContributorHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blob = new Contributor();
        $blob->avatarUrl = $dataMapper->extractValue($data, 'avatar_url');
        $blob->contributions = $dataMapper->extractValue($data, 'contributions');
        $blob->eventsUrl = $dataMapper->extractValue($data, 'events_url');
        $blob->followersUrl = $dataMapper->extractValue($data, 'followers_url');
        $blob->followingUrl = $dataMapper->extractValue($data, 'following_url');
        $blob->gistsUrl = $dataMapper->extractValue($data, 'gists_url');
        $blob->gravatarId = $dataMapper->extractValue($data, 'gravatar_id');
        $blob->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $blob->id = $dataMapper->extractValue($data, 'id');
        $blob->login = $dataMapper->extractValue($data, 'login');
        $blob->organizationsUrl = $dataMapper->extractValue($data, 'organizations_url');
        $blob->receivedEventsUrl = $dataMapper->extractValue($data, 'received_events_url');
        $blob->reposUrl = $dataMapper->extractValue($data, 'repos_url');
        $blob->siteAdmin = $dataMapper->extractValue($data, 'site_admin');
        $blob->starredUrl = $dataMapper->extractValue($data, 'starred_url');
        $blob->subscriptionsUrl = $dataMapper->extractValue($data, 'subscriptions_url');
        $blob->type = $dataMapper->extractValue($data, 'type');
        $blob->url = $dataMapper->extractValue($data, 'url');

        return $blob;
    }
}
