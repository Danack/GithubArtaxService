<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\Commit;

class CommitHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commit = new Commit();
        $commit->url = $dataMapper->extractValue($data, 'url');
        $commit->sha = $dataMapper->extractValue($data, 'sha');
        $commit->htmlURL = $dataMapper->extractValue($data, 'html_url', true);

        $parents = $dataMapper->extractValue($data, 'parents');
        $commit->parents = [];
        foreach ($parents as $entry) {
            $commit->parents[] = $dataMapper->instantiateClass('GithubService\Model\CommitParent', $entry);
        }

        $commitInfo = $dataMapper->extractValue($data, 'commit');
        $commit->commitInfo = $dataMapper->instantiateClass('GithubService\Model\CommitInfo', $commitInfo);

        $author = $dataMapper->extractValue($data, 'author');
        $commit->author = $dataMapper->instantiateClass('GithubService\Model\Person', $author);

        $committer = $dataMapper->extractValue($data, 'committer');
        $commit->committer = $dataMapper->instantiateClass('GithubService\Model\Person', $committer);
        
        return $commit;
    }
}
