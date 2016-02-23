<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Tags;


class TagsHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $tags = new Tags();
        foreach ($data as $entry) {
            $tags->repoTags[] = $dataMapper->instantiateClass('GithubService\\Model\\Tag', $entry);
        }

        return $tags;
    }
}
