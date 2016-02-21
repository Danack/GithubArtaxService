<?php

namespace GithubService\Hydrator;

use GithubService\DataMapper;
use GithubService\Hydrator;
use GithubService\Model\CommitList;

class CommitListHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $emojiList = new CommitList();
        foreach ($data as $entry) {
            $emojiList->commitsChild[] = $dataMapper->instantiateClass(
                'GithubService\Model\Commit',
                $entry
            );
        }

        return $emojiList;
    }
}
