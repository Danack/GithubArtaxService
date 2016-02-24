<?php 

namespace GithubService\Model;

class GithubOauth
{
    use GithubTrait;
    use SafeAccess;
    
    public $clientId = null;

    public $clientSecret = null;

    public $organizationName = null;

    public $organizationTeam = null;

    protected function getDataMap() {
        $dataMap = [
            ['clientId', 'client_id'],
            ['clientSecret', 'client_secret'],
            ['organizationName', 'organization_name'],
            ['organizationTeam', 'organization_team'],
        ];

        return $dataMap;
    }


}
