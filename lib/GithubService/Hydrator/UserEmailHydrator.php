<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\UserEmail;

class UserEmailHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $commitInfo = new UserEmail();
        $commitInfo->email = $dataMapper->extractValue($data, 'email');
        $commitInfo->primary = $dataMapper->extractValue($data, 'primary');
        $commitInfo->verified = $dataMapper->extractValue($data, 'verified');

        return $commitInfo;
    }
}
