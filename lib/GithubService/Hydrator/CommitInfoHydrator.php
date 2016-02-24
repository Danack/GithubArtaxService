<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\CommitInfo;




class CommitInfoHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commitInfo = new CommitInfo();

        $commitInfo->url = $hydratorRegistry->extractValue($data, 'url');
        $commitInfo->authorName = $hydratorRegistry->extractValueByPath($data, ['author', 'name']);
        $commitInfo->authorEmail = $hydratorRegistry->extractValueByPath($data,  ['author', 'email']);
        $commitInfo->authorDate = $hydratorRegistry->extractValueByPath($data,  ['author', 'date']);
        $commitInfo->committerName = $hydratorRegistry->extractValueByPath($data,  ['committer', 'name']);
        $commitInfo->committerEmail = $hydratorRegistry->extractValueByPath($data,  ['committer', 'email']);
        $commitInfo->committerDate = $hydratorRegistry->extractValueByPath($data,  ['committer', 'date']);
        $commitInfo->message = $hydratorRegistry->extractValue($data, 'message');
        $commitInfo->treeURL = $hydratorRegistry->extractValueByPath($data, ['tree', 'url']);
        $commitInfo->treeSHA = $hydratorRegistry->extractValueByPath($data, ['tree', 'sha']);
        $commitInfo->commentCount = $hydratorRegistry->extractValue($data, 'comment_count', true);

        return $commitInfo;
    }
}
