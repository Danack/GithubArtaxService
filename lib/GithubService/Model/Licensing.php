<?php 

namespace GithubService\Model;

class Licensing
{
    public $daysUntilExpiration = null;

    public $expireAt = null;

    public $kind = null;

    public $seats = null;

    public $seatsAvailable = null;

    public $seatsUsed = null;

    protected function getDataMap() {
        $dataMap = [
            ['daysUntilExpiration', 'days_until_expiration'],
            ['expireAt', 'expire_at'],
            ['kind', 'kind'],
            ['seats', 'seats'],
            ['seatsAvailable', 'seats_available'],
            ['seatsUsed', 'seats_used'],
        ];

        return $dataMap;
    }
}
