<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\ReadmeContent;

class ReadmeContentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new ReadmeContent();
        $commitInfo->content = $dataMapper->extractValue($data, 'content');
        $commitInfo->downloadUrl = $dataMapper->extractValue($data, 'download_url');
        $commitInfo->encoding = $dataMapper->extractValue($data, 'encoding');
        $commitInfo->gitUrl = $dataMapper->extractValue($data, 'git_url');
        $commitInfo->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $commitInfo->name = $dataMapper->extractValue($data, 'name');
        $commitInfo->path = $dataMapper->extractValue($data, 'path');
        $commitInfo->sha = $dataMapper->extractValue($data, 'sha');
        $commitInfo->size = $dataMapper->extractValue($data, 'size');
        $commitInfo->type = $dataMapper->extractValue($data, 'type');
        $commitInfo->url = $dataMapper->extractValue($data, 'url');
        //TODO - redo links
        //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
        return $commitInfo;
    }
}
