<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Tags;


class TagsHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $tags = new Tags();
        foreach ($data as $entry) {
            $tags->repoTags[] = $hydratorRegistry->instantiateClass('GithubService\\Model\\Tag', $entry);
        }

        return $tags;
    }
}
