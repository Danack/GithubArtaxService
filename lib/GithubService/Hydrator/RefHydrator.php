<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Ref;




class RefHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $ref = new Ref();
        $refObjectData = $dataMapper->extractValue($data, 'object');
        $ref->refObject = $dataMapper->instantiateClass('GithubService\Model\RefObject', $refObjectData);
        $ref->ref = $dataMapper->extractValue($data, 'ref');
        $ref->url = $dataMapper->extractValue($data, 'url');

        return $ref;
    }
}
