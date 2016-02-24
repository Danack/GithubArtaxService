<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Branches;

class BranchesHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $branches = new Branches();

        foreach ($data as $entry) {
            $object = $hydratorRegistry->instantiateClass('GithubService\Model\BranchCommit', $entry);
            $branches->branchList[] = $object;
        }

        return $branches;
    }
}
