<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\SymlinkContent;

class SymlinkContentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $repoSearchItem = new SymlinkContent();
        $repoSearchItem->downloadUrl = $hydratorRegistry->extractValue($data, 'download_url');
        $repoSearchItem->gitUrl = $hydratorRegistry->extractValue($data, 'git_url');
        $repoSearchItem->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $repoSearchItem->name = $hydratorRegistry->extractValue($data, 'name');
        $repoSearchItem->path = $hydratorRegistry->extractValue($data, 'path');
        $repoSearchItem->sha = $hydratorRegistry->extractValue($data, 'sha');
        $repoSearchItem->size = $hydratorRegistry->extractValue($data, 'size');
        $repoSearchItem->target = $hydratorRegistry->extractValue($data, 'target');
        $repoSearchItem->type = $hydratorRegistry->extractValue($data, 'type');
        $repoSearchItem->url = $hydratorRegistry->extractValue($data, 'url');

        return $repoSearchItem;
    }
}
