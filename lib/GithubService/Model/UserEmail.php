<?php 

namespace GithubService\Model;

class UserEmail extends \GithubService\Model\DataMapper {

    public $email = null;

    public $primary = null;

    public $verified = null;

    protected function getDataMap() {
        $dataMap = [
            ['email', 'email'],
            ['primary', 'primary'],
            ['verified', 'verified'],
        ];

        return $dataMap;
    }


}
