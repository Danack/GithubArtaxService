<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\CommitList;

class CommitListHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $emojiList = new CommitList();
        foreach ($data as $entry) {
            $emojiList->commitsChild[] = $hydratorRegistry->instantiateClass(
                'GithubService\Model\Commit',
                $entry
            );
        }

        return $emojiList;
    }
}
