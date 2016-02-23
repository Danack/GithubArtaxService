<?php 

namespace GithubService\Model;

class Customer
{
    public $email = null;

    public $name = null;

    public $publicKeyData = null;

    public $secretKeyData = null;

    public $uuid = null;

    protected function getDataMap() {
        $dataMap = [
            ['email', 'email'],
            ['name', 'name'],
            ['publicKeyData', 'public_key_data'],
            ['secretKeyData', 'secret_key_data'],
            ['uuid', 'uuid'],
        ];

        return $dataMap;
    }
}
