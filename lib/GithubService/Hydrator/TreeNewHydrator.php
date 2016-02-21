<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\TreeNew;


class TreeNewHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $treeNew = new TreeNew();
        $treeNew->mode = $dataMapper->extractValue($data, 'mode');
        $treeNew->path = $dataMapper->extractValue($data, 'path');
        $treeNew->sha = $dataMapper->extractValue($data, 'sha');
        $treeNew->size = $dataMapper->extractValue($data, 'size', true);
        $treeNew->type = $dataMapper->extractValue($data, 'type');
        $treeNew->url = $dataMapper->extractValue($data, 'url');

        return $treeNew;
    }
}
