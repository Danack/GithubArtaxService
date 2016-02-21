<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Refs;

class RefsHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $ref = new Refs();
        foreach ($data as $refData) {
            $ref->refs[] = $dataMapper->instantiate('GithubService\Model\Ref', $refData);
        }

        return $ref;
    }
}
