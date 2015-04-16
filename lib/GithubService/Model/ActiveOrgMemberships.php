<?php 

namespace GithubService\Model;

class ActiveOrgMemberships extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ActiveAdminOrgMembership $aCTIVEORGMEMBERSHIPS Child
     */
    public $aCTIVEORGMEMBERSHIPS Child = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['aCTIVEORGMEMBERSHIPS Child', 'ACTIVE_ORG_MEMBERSHIPS _child', 'multiple' => true, 'class' => 'GithubService\\Model\\ActiveAdminOrgMembership'],
        ];

        return $dataMap;
    }


}
