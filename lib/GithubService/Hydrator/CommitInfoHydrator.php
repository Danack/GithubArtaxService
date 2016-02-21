<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\CommitInfo;




class CommitInfoHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new CommitInfo();

        $commitInfo->url = $dataMapper->extractValue($data, 'url');
        $commitInfo->authorName = $dataMapper->extractValueByPath($data, ['author', 'name']);
        $commitInfo->authorEmail = $dataMapper->extractValueByPath($data,  ['author', 'email']);
        $commitInfo->authorDate = $dataMapper->extractValueByPath($data,  ['author', 'date']);
        $commitInfo->committerName = $dataMapper->extractValueByPath($data,  ['committer', 'name']);
        $commitInfo->committerEmail = $dataMapper->extractValueByPath($data,  ['committer', 'email']);
        $commitInfo->committerDate = $dataMapper->extractValueByPath($data,  ['committer', 'date']);
        $commitInfo->message = $dataMapper->extractValue($data, 'message');
        $commitInfo->treeURL = $dataMapper->extractValueByPath($data, ['tree', 'url']);
        $commitInfo->treeSHA = $dataMapper->extractValueByPath($data, ['tree', 'sha']);
        $commitInfo->commentCount = $dataMapper->extractValue($data, 'comment_count', true);

        return $commitInfo;
    }
}
