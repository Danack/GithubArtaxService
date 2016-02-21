<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\CommitParent;

class UserHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new CommitParent();
        $commitInfo->avatarUrl = $dataMapper->extractValue($data, 'avatar_url');
        $commitInfo->eventsUrl = $dataMapper->extractValue($data, 'events_url');
        $commitInfo->followersUrl = $dataMapper->extractValue($data, 'followers_url');
        $commitInfo->followingUrl = $dataMapper->extractValue($data, 'following_url');
        $commitInfo->gistsUrl = $dataMapper->extractValue($data, 'gists_url');
        $commitInfo->gravatarId = $dataMapper->extractValue($data, 'gravatar_id');
        $commitInfo->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $commitInfo->id = $dataMapper->extractValue($data, 'id');
        $commitInfo->login = $dataMapper->extractValue($data, 'login');
        $commitInfo->organizationsUrl = $dataMapper->extractValue($data, 'organizations_url');
        $commitInfo->receivedEventsUrl = $dataMapper->extractValue($data, 'received_events_url');
        $commitInfo->reposUrl = $dataMapper->extractValue($data, 'repos_url');
        $commitInfo->starredUrl = $dataMapper->extractValue($data, 'starred_url');
        $commitInfo->subscriptionsUrl = $dataMapper->extractValue($data, 'subscriptions_url');
        $commitInfo->type = $dataMapper->extractValue($data, 'type');
        $commitInfo->url = $dataMapper->extractValue($data, 'url');

        return $commitInfo;
    }
}
