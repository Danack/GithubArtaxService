<?php 

namespace GithubService\Model;

class ActiveTeamMembership
{
    use GithubTrait;
    use SafeAccess;
    
    public $state = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['state', 'state'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
