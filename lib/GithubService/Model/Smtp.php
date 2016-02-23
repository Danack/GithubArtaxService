<?php 

namespace GithubService\Model;

class Smtp
{
    public $address = null;

    public $authentication = null;

    public $domain = null;

    public $enabled = null;

    public $enableStarttlsAuto = null;

    public $noreplyAddress = null;

    public $password = null;

    public $port = null;

    public $supportAddress = null;

    public $userName = null;

    public $username = null;

    protected function getDataMap() {
        $dataMap = [
            ['address', 'address'],
            ['authentication', 'authentication'],
            ['domain', 'domain'],
            ['enabled', 'enabled'],
            ['enableStarttlsAuto', 'enable_starttls_auto'],
            ['noreplyAddress', 'noreply_address'],
            ['password', 'password'],
            ['port', 'port'],
            ['supportAddress', 'support_address'],
            ['userName', 'user_name'],
            ['username', 'username'],
        ];

        return $dataMap;
    }
}
