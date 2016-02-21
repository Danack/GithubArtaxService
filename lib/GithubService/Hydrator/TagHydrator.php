<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Tag;



class TagHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $tag = new Tag();
        $commit = $dataMapper->extractValue($data, 'commit');
        $tag->commit = $dataMapper->instantiate('GithubService\\Model\\BlobAfterCreate', $commit);
        $tag->name = $dataMapper->extractValue($data, 'name');
        $tag->tarballUrl = $dataMapper->extractValue($data, 'tarball_url');
        $tag->zipballUrl = $dataMapper->extractValue($data, 'zipball_url');

        return $tag;
    }
}
