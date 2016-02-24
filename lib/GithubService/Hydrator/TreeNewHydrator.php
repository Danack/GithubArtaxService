<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\TreeNew;


class TreeNewHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $treeNew = new TreeNew();
        $treeNew->mode = $hydratorRegistry->extractValue($data, 'mode');
        $treeNew->path = $hydratorRegistry->extractValue($data, 'path');
        $treeNew->sha = $hydratorRegistry->extractValue($data, 'sha');
        $treeNew->size = $hydratorRegistry->extractValue($data, 'size', true);
        $treeNew->type = $hydratorRegistry->extractValue($data, 'type');
        $treeNew->url = $hydratorRegistry->extractValue($data, 'url');

        return $treeNew;
    }
}
