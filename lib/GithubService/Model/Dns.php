<?php 

namespace GithubService\Model;

class Dns
{
    use GithubTrait;
    use SafeAccess;
    
    public $primaryNameserver = null;

    public $secondaryNameserver = null;

    protected function getDataMap() {
        $dataMap = [
            ['primaryNameserver', 'primary_nameserver'],
            ['secondaryNameserver', 'secondary_nameserver'],
        ];

        return $dataMap;
    }
}
