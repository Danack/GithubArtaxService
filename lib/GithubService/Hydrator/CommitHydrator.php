<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Commit;

class CommitHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $commit = new Commit();
        $commit->url = $hydratorRegistry->extractValue($data, 'url');
        $commit->sha = $hydratorRegistry->extractValue($data, 'sha');
        $commit->htmlURL = $hydratorRegistry->extractValue($data, 'html_url', true);

        $parents = $hydratorRegistry->extractValue($data, 'parents');
        $commit->parents = [];
        foreach ($parents as $entry) {
            $commit->parents[] = $hydratorRegistry->instantiateClass('GithubService\Model\CommitParent', $entry);
        }

        $commitInfo = $hydratorRegistry->extractValue($data, 'commit');
        $commit->commitInfo = $hydratorRegistry->instantiateClass('GithubService\Model\CommitInfo', $commitInfo);

        $author = $hydratorRegistry->extractValue($data, 'author');
        if ($author) {
            $commit->author = $hydratorRegistry->instantiateClass('GithubService\Model\Person', $author);
        }

        $committer = $hydratorRegistry->extractValue($data, 'committer');
        if ($committer) {
            $commit->committer = $hydratorRegistry->instantiateClass('GithubService\Model\Person', $committer);
        }
        
        return $commit;
    }
}
