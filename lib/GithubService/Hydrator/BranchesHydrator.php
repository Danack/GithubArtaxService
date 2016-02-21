<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Branches;

class BranchesHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $branches = new Branches();

        foreach ($data as $entry) {
            $object = $dataMapper->instantiate('GithubService\Model\BranchCommit', $entry);
            $branches->branchList[] = $object;
        }

        return $branches;
    }
}
