<?php 

namespace GithubService\Model;

class Rsyslog
{
    use GithubTrait;
    use SafeAccess;
    
    public $enabled = null;

    public $protocolName = null;

    public $server = null;

    protected function getDataMap() {
        $dataMap = [
            ['enabled', 'enabled'],
            ['protocolName', 'protocol_name'],
            ['server', 'server'],
        ];

        return $dataMap;
    }
}
