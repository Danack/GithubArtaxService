<?php 

namespace GithubService\Model;

class OauthAccessList extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\OauthAccess[]
     */
    public $accessList = [];

    protected function getDataMap() {
        $dataMap = [
            ['accessList', '', 'class' => 'GithubService\\Model\\OauthAccess', 'multiple' => true],
        ];

        return $dataMap;
    }


}
