<?php 

namespace GithubService\Model;

class ActiveOrgMemberships
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $aCTIVEORGMEMBERSHIPS Child
     */
    public $aCTIVEORGMEMBERSHIPSChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['aCTIVEORGMEMBERSHIPS Child', 'ACTIVE_ORG_MEMBERSHIPS _child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }


}
