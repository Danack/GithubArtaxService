<?php 

namespace GithubService\Model;

class Ldap extends \GithubService\Model\DataMapper {

    public $adminGroup = null;

    /**
     * @var \GithubService\Model\Indices $base
     */
    public $base = array(
        
    );

    public $bindDn = null;

    public $host = null;

    public $method = null;

    public $password = null;

    public $port = null;

    public $uid = null;

    /**
     * @var \GithubService\Model\Indices $userGroups
     */
    public $userGroups = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['adminGroup', 'admin_group'],
            ['base', 'base', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['bindDn', 'bind_dn'],
            ['host', 'host'],
            ['method', 'method'],
            ['password', 'password'],
            ['port', 'port'],
            ['uid', 'uid'],
            ['userGroups', 'user_groups', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
        ];

        return $dataMap;
    }


}
