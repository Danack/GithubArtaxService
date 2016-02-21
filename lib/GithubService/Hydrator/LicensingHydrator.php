<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\Licensing;

class LicensingHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $licensing = new Licensing();
        $licensing->daysUntilExpiration = $dataMapper->extractValue($data, 'days_until_expiration');
        $licensing->expireAt = $dataMapper->extractValue($data, 'expire_at');
        $licensing->kind = $dataMapper->extractValue($data, 'kind');
        $licensing->seats = $dataMapper->extractValue($data, 'seats');
        $licensing->seatsAvailable = $dataMapper->extractValue($data, 'seats_available');
        $licensing->seatsUsed = $dataMapper->extractValue($data, 'seats_used');

        return $licensing;
    }
}
