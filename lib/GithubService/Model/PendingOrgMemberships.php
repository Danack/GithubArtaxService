<?php 

namespace GithubService\Model;

class PendingOrgMemberships
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $pENDINGORGMEMBERSHIPSChild
     */
    public $pENDINGORGMEMBERSHIPSChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['pENDINGORGMEMBERSHIPSChild', 'PENDING_ORG_MEMBERSHIPS_child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }
}
