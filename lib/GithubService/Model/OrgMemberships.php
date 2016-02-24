<?php 

namespace GithubService\Model;

class OrgMemberships
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $oRGMEMBERSHIPSChild
     */
    public $oRGMEMBERSHIPSChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['oRGMEMBERSHIPSChild', 'ORG_MEMBERSHIPS_child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }


}
