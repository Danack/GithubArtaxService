<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\UserInSearchResult;





class UserInSearchResultHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $userInSearchResult = new UserInSearchResult();

        $userInSearchResult->email = $dataMapper->extractValue($data, 'email');
        $userInSearchResult->location = $dataMapper->extractValue($data, 'location');
        $userInSearchResult->publicGistCount = $dataMapper->extractValue($data, 'public_gist_count');
        $userInSearchResult->gravatarId = $dataMapper->extractValue($data, 'gravatar_id');
        $userInSearchResult->type = $dataMapper->extractValue($data, 'type');
        $userInSearchResult->login = $dataMapper->extractValue($data, 'login');
        $userInSearchResult->blog = $dataMapper->extractValue($data, 'blog');
        $userInSearchResult->createdAt = $dataMapper->extractValue($data, 'created_at');
        $userInSearchResult->id = $dataMapper->extractValue($data, 'id');
        $userInSearchResult->created = $dataMapper->extractValue($data, 'created');
        $userInSearchResult->company = $dataMapper->extractValue($data, 'company');
        $userInSearchResult->name = $dataMapper->extractValue($data, 'name');
        $userInSearchResult->followingCount = $dataMapper->extractValue($data, 'following_count');
        $userInSearchResult->followersCount = $dataMapper->extractValue($data, 'followers_count');
        $userInSearchResult->followersCount = $dataMapper->extractValue($data, 'public_repo_count');

        return $userInSearchResult;
    }
}
