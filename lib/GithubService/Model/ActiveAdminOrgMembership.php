<?php 

namespace GithubService\Model;

class ActiveAdminOrgMembership 
{
    /**
     * @var \GithubService\Model\ $organization
     */
    public $organization = null;

    public $organizationUrl = null;

    public $role = null;

    public $state = null;

    public $url = null;

    /**
     * @var \GithubService\Model\ $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['organization', 'organization', 'class' => 'GithubService\\Model\\Organization'],
            ['organizationUrl', 'organization_url'],
            ['role', 'role'],
            ['state', 'state'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
