<?php 

namespace GithubService\Model;

class OrgMemberships extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $oRGMEMBERSHIPSChild
     */
    public $oRGMEMBERSHIPSChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['oRGMEMBERSHIPSChild', 'ORG_MEMBERSHIPS_child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }


}
