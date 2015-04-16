<?php 

namespace GithubService\Model;

class ActiveTeamMembership extends \GithubService\Model\DataMapper {

    public $state = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['state', 'state'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
