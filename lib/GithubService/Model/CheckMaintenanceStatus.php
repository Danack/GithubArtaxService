<?php 

namespace GithubService\Model;

class CheckMaintenanceStatus
{
    /**
     * @var \GithubService\Model\ $connectionServices
     */
    public $connectionServices = null;

    public $scheduledTime = null;

    public $status = null;

    protected function getDataMap() {
        $dataMap = [
            ['connectionServices', 'connection_services', 'class' => 'GithubService\\Model\\ConnectionServices'],
            ['scheduledTime', 'scheduled_time'],
            ['status', 'status'],
        ];

        return $dataMap;
    }


}
