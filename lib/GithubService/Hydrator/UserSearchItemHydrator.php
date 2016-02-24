<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\UserSearchItem;

class UserSearchItemHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new UserSearchItem();
        $commitInfo->created = $hydratorRegistry->extractValue($data, 'created');
        $commitInfo->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $commitInfo->followers = $hydratorRegistry->extractValue($data, 'followers');
        $commitInfo->followersCount = $hydratorRegistry->extractValue($data, 'followers_count');
        $commitInfo->fullname = $hydratorRegistry->extractValue($data, 'fullname');
        $commitInfo->gravatarId = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $commitInfo->id = $hydratorRegistry->extractValue($data, 'id');
        $commitInfo->language = $hydratorRegistry->extractValue($data, 'language');
        $commitInfo->location = $hydratorRegistry->extractValue($data, 'location');
        $commitInfo->login = $hydratorRegistry->extractValue($data, 'login');
        $commitInfo->name = $hydratorRegistry->extractValue($data, 'name');
        $commitInfo->publicRepoCount = $hydratorRegistry->extractValue($data, 'public_repo_count');
        $commitInfo->repos = $hydratorRegistry->extractValue($data, 'repos');
        $commitInfo->score = $hydratorRegistry->extractValue($data, 'score');
        $commitInfo->type = $hydratorRegistry->extractValue($data, 'type');
        $commitInfo->username = $hydratorRegistry->extractValue($data, 'username');

        return $commitInfo;
    }
}
