<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\Licensing;

class LicensingHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $licensing = new Licensing();
        $licensing->daysUntilExpiration = $hydratorRegistry->extractValue($data, 'days_until_expiration');
        $licensing->expireAt = $hydratorRegistry->extractValue($data, 'expire_at');
        $licensing->kind = $hydratorRegistry->extractValue($data, 'kind');
        $licensing->seats = $hydratorRegistry->extractValue($data, 'seats');
        $licensing->seatsAvailable = $hydratorRegistry->extractValue($data, 'seats_available');
        $licensing->seatsUsed = $hydratorRegistry->extractValue($data, 'seats_used');

        return $licensing;
    }
}
