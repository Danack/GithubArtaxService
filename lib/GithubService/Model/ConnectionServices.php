<?php 

namespace GithubService\Model;

class ConnectionServices
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $connectionServicesChild
     */
    public $connectionServicesChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['connectionServicesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ConnectionServicesChild'],
        ];

        return $dataMap;
    }
}
