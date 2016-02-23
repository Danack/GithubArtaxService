<?php 

namespace GithubService\Model;

class CurrentUserOrganizations
{
    /**
     * @var \GithubService\Model\CurrentUser $currentUserOrganizationsChild
     */
    public $currentUserOrganizationsChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['currentUserOrganizationsChild', 'current_user_organizations_child', 'multiple' => true, 'class' => 'GithubService\\Model\\CurrentUser'],
        ];

        return $dataMap;
    }
}
