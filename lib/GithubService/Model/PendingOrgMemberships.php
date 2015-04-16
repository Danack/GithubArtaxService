<?php 

namespace GithubService\Model;

class PendingOrgMemberships extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $pENDINGORGMEMBERSHIPSChild
     */
    public $pENDINGORGMEMBERSHIPSChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['pENDINGORGMEMBERSHIPSChild', 'PENDING_ORG_MEMBERSHIPS_child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }


}