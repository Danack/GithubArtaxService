<?php 

namespace GithubService\Model;

class CurrentUserOrganizations
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\CurrentUser $currentUserOrganizationsChild
     */
    public $currentUserOrganizationsChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['currentUserOrganizationsChild', 'current_user_organizations_child', 'multiple' => true, 'class' => 'GithubService\\Model\\CurrentUser'],
        ];

        return $dataMap;
    }
}
