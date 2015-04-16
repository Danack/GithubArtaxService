<?php 

namespace GithubService\Model;

class License extends \GithubService\Model\DataMapper {

    public $evaluation = null;

    public $expireAt = null;

    public $perpetual = null;

    public $seats = null;

    public $sshAllowed = null;

    public $supportKey = null;

    public $unlimitedSeating = null;

    protected function getDataMap() {
        $dataMap = [
            ['evaluation', 'evaluation'],
            ['expireAt', 'expire_at'],
            ['perpetual', 'perpetual'],
            ['seats', 'seats'],
            ['sshAllowed', 'ssh_allowed'],
            ['supportKey', 'support_key'],
            ['unlimitedSeating', 'unlimited_seating'],
        ];

        return $dataMap;
    }


}
