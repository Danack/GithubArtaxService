<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\SymlinkContent;


class SymlinkContentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $repoSearchItem = new SymlinkContent();
        $repoSearchItem->downloadUrl = $dataMapper->extractValue($data, 'download_url');
        $repoSearchItem->gitUrl = $dataMapper->extractValue($data, 'git_url');
        $repoSearchItem->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $repoSearchItem->name = $dataMapper->extractValue($data, 'name');
        $repoSearchItem->path = $dataMapper->extractValue($data, 'path');
        $repoSearchItem->sha = $dataMapper->extractValue($data, 'sha');
        $repoSearchItem->size = $dataMapper->extractValue($data, 'size');
        $repoSearchItem->target = $dataMapper->extractValue($data, 'target');
        $repoSearchItem->type = $dataMapper->extractValue($data, 'type');
        $repoSearchItem->url = $dataMapper->extractValue($data, 'url');

        return $repoSearchItem;
    }
}
