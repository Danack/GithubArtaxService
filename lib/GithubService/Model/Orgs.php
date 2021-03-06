<?php 

namespace GithubService\Model;

class Orgs
{
    use GithubTrait;
    use SafeAccess;
    
    public $disabledOrgs = null;

    public $totalOrgs = null;

    public $totalTeamMembers = null;

    public $totalTeams = null;

    protected function getDataMap() {
        $dataMap = [
            ['disabledOrgs', 'disabled_orgs'],
            ['totalOrgs', 'total_orgs'],
            ['totalTeamMembers', 'total_team_members'],
            ['totalTeams', 'total_teams'],
        ];

        return $dataMap;
    }
}
