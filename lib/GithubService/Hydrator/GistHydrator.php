<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Gist;

class GistHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $gist = new Gist();
        $gist->comments = $dataMapper->extractValue($data, 'comments');
        $gist->comments_url = $dataMapper->extractValue($data, 'comments_url');
        $gist->commitsUrl = $dataMapper->extractValue($data, 'commits_url');
        $gist->created_at = $dataMapper->extractValue($data, 'created_at');
        $gist->description = $dataMapper->extractValue($data, 'description');
        $gist->forksUrl = $dataMapper->extractValue($data, 'forks_url');
        $gist->gitPullUrl = $dataMapper->extractValue($data, 'git_pull_url');
        $gist->gitPushUrl = $dataMapper->extractValue($data, 'git_push_url');
        $gist->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $gist->id = $dataMapper->extractValue($data, 'id');
        $gist->public = $dataMapper->extractValue($data, 'public');
        $gist->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $gist->url = $dataMapper->extractValue($data, 'url');
        $gist->user = $dataMapper->extractValue($data, 'user');
        
        $files = $dataMapper->extractValue($data, 'files');
        $gist->files = $dataMapper->instantiateClass('GithubService\Model\FileList', $files);
        
        $owner = $dataMapper->extractValue($data, 'owner');
        $gist->owner = $dataMapper->instantiateClass('GithubService\Model\User', $owner);

        return $gist;
    }
}
