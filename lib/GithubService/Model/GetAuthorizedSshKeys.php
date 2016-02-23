<?php 

namespace GithubService\Model;

class GetAuthorizedSshKeys
{
    /**
     * @var \GithubService\Model\ $gETAUTHORIZEDSSHKEYSChild
     */
    public $keyList = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['keyList', '', 'multiple' => true, 'class' => 'GithubService\\Model\\GetAuthorizedSshKeysChild'],
        ];

        return $dataMap;
    }
}
