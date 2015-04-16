<?php 

namespace GithubService\Model;

class UsersStats extends \GithubService\Model\DataMapper {

    public $totalUsers;
    public $suspendedUsers;
    public $adminUsers;

    protected function getDataMap() {
        $dataMap = [
            ["totalUsers", "total_users"],
            ["suspendedUsers", "suspended_users"],
            ["adminUsers", "admin_users"],           
        ];

        return $dataMap;
    }
}
