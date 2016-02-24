<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Gist;

class GistHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $gist = new Gist();
        $gist->comments = $hydratorRegistry->extractValue($data, 'comments');
        $gist->commentsUrl = $hydratorRegistry->extractValue($data, 'comments_url');
        $gist->commitsUrl = $hydratorRegistry->extractValue($data, 'commits_url');
        $gist->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $gist->description = $hydratorRegistry->extractValue($data, 'description');
        $gist->forksUrl = $hydratorRegistry->extractValue($data, 'forks_url');
        $gist->gitPullUrl = $hydratorRegistry->extractValue($data, 'git_pull_url');
        $gist->gitPushUrl = $hydratorRegistry->extractValue($data, 'git_push_url');
        $gist->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $gist->id = $hydratorRegistry->extractValue($data, 'id');
        $gist->public = $hydratorRegistry->extractValue($data, 'public');
        $gist->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $gist->url = $hydratorRegistry->extractValue($data, 'url');
        $gist->user = $hydratorRegistry->extractValue($data, 'user');

        $files = $hydratorRegistry->extractValue($data, 'files');
        $gist->files = $hydratorRegistry->instantiateClass('GithubService\Model\FileList', $files);

        $owner = $hydratorRegistry->extractValue($data, 'owner');
        $gist->owner = $hydratorRegistry->instantiateClass('GithubService\Model\User', $owner);

        return $gist;
    }
}
