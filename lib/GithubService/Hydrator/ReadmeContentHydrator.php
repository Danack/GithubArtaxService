<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\ReadmeContent;

class ReadmeContentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new ReadmeContent();
        $commitInfo->content = $hydratorRegistry->extractValue($data, 'content');
        $commitInfo->downloadUrl = $hydratorRegistry->extractValue($data, 'download_url');
        $commitInfo->encoding = $hydratorRegistry->extractValue($data, 'encoding');
        $commitInfo->gitUrl = $hydratorRegistry->extractValue($data, 'git_url');
        $commitInfo->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $commitInfo->name = $hydratorRegistry->extractValue($data, 'name');
        $commitInfo->path = $hydratorRegistry->extractValue($data, 'path');
        $commitInfo->sha = $hydratorRegistry->extractValue($data, 'sha');
        $commitInfo->size = $hydratorRegistry->extractValue($data, 'size');
        $commitInfo->type = $hydratorRegistry->extractValue($data, 'type');
        $commitInfo->url = $hydratorRegistry->extractValue($data, 'url');
        //TODO - redo links
        //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
        return $commitInfo;
    }
}
