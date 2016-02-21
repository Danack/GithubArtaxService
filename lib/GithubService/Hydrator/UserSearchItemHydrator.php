<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\UserSearchItem;

class UserSearchItemHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new UserSearchItem();
        $commitInfo->created = $dataMapper->extractValue($data, 'created');
        $commitInfo->createdAt = $dataMapper->extractValue($data, 'created_at');
        $commitInfo->followers = $dataMapper->extractValue($data, 'followers');
        $commitInfo->followersCount = $dataMapper->extractValue($data, 'followers_count');
        $commitInfo->fullname = $dataMapper->extractValue($data, 'fullname');
        $commitInfo->gravatarId = $dataMapper->extractValue($data, 'gravatar_id');
        $commitInfo->id = $dataMapper->extractValue($data, 'id');
        $commitInfo->language = $dataMapper->extractValue($data, 'language');
        $commitInfo->location = $dataMapper->extractValue($data, 'location');
        $commitInfo->login = $dataMapper->extractValue($data, 'login');
        $commitInfo->name = $dataMapper->extractValue($data, 'name');
        $commitInfo->publicRepoCount = $dataMapper->extractValue($data, 'public_repo_count');
        $commitInfo->repos = $dataMapper->extractValue($data, 'repos');
        $commitInfo->score = $dataMapper->extractValue($data, 'score');
        $commitInfo->type = $dataMapper->extractValue($data, 'type');
        $commitInfo->username = $dataMapper->extractValue($data, 'username');

        return $commitInfo;
    }
}
