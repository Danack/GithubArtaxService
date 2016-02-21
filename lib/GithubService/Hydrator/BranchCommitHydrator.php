<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;

use GithubService\Model\BranchCommit;



class BranchCommitHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $blob = new BranchCommit();
        $blob->name = $dataMapper->extractValue($data, 'name');
        $blob->url = $dataMapper->extractValueByPath($data, ['commit', 'url']);
        $blob->sha = $dataMapper->extractValueByPath($data, ['commit', 'sha']);

        return $blob;
    }
}
