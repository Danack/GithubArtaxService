<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\UserInSearchResult;

class UserInSearchResultHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $userInSearchResult = new UserInSearchResult();
        $userInSearchResult->email = $hydratorRegistry->extractValue($data, 'email');
        $userInSearchResult->location = $hydratorRegistry->extractValue($data, 'location');
        $userInSearchResult->publicGistCount = $hydratorRegistry->extractValue($data, 'public_gist_count');
        $userInSearchResult->gravatarId = $hydratorRegistry->extractValue($data, 'gravatar_id');
        $userInSearchResult->type = $hydratorRegistry->extractValue($data, 'type');
        $userInSearchResult->login = $hydratorRegistry->extractValue($data, 'login');
        $userInSearchResult->blog = $hydratorRegistry->extractValue($data, 'blog');
        $userInSearchResult->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $userInSearchResult->id = $hydratorRegistry->extractValue($data, 'id');
        $userInSearchResult->created = $hydratorRegistry->extractValue($data, 'created');
        $userInSearchResult->company = $hydratorRegistry->extractValue($data, 'company');
        $userInSearchResult->name = $hydratorRegistry->extractValue($data, 'name');
        $userInSearchResult->followingCount = $hydratorRegistry->extractValue($data, 'following_count');
        $userInSearchResult->followersCount = $hydratorRegistry->extractValue($data, 'followers_count');
        $userInSearchResult->followersCount = $hydratorRegistry->extractValue($data, 'public_repo_count');

        return $userInSearchResult;
    }
}
