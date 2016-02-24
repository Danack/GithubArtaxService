<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\BranchCommit;

class BranchCommitHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $blob = new BranchCommit();
        $blob->name = $hydratorRegistry->extractValue($data, 'name');
        $blob->url = $hydratorRegistry->extractValueByPath($data, ['commit', 'url']);
        $blob->sha = $hydratorRegistry->extractValueByPath($data, ['commit', 'sha']);

        return $blob;
    }
}
