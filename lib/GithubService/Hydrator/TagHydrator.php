<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Tag;

class TagHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $tag = new Tag();
        $commit = $hydratorRegistry->extractValue($data, 'commit');
        $tag->commit = $hydratorRegistry->instantiateClass('GithubService\\Model\\BlobAfterCreate', $commit);
        $tag->name = $hydratorRegistry->extractValue($data, 'name');
        $tag->tarballUrl = $hydratorRegistry->extractValue($data, 'tarball_url');
        $tag->zipballUrl = $hydratorRegistry->extractValue($data, 'zipball_url');

        return $tag;
    }
}
