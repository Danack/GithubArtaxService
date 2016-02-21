<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\TagObject;



class TagObjectHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $tagObject = new TagObject();
        $tagObject->url = $dataMapper->extractValue($data, 'url');
        $tagObject->sha = $dataMapper->extractValue($data, 'sha');
        $tagObject->type = $dataMapper->extractValue($data, 'type');

        return $tagObject;
    }
}
