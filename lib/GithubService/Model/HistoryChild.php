<?php 

namespace GithubService\Model;

class HistoryChild extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Stats $changeStatus
     */
    public $changeStatus = null;

    public $committedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    public $version = null;

    protected function getDataMap() {
        $dataMap = [
            ['changeStatus', 'change_status', 'class' => 'GithubService\\Model\\Stats'],
            ['committedAt', 'committed_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
            ['version', 'version'],
        ];

        return $dataMap;
    }


}
