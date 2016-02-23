<?php 

namespace GithubService\Model;

class UsersStats
{
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
