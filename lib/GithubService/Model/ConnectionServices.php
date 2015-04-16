<?php 

namespace GithubService\Model;

class ConnectionServices extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $connectionServicesChild
     */
    public $connectionServicesChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['connectionServicesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ConnectionServicesChild'],
        ];

        return $dataMap;
    }


}
