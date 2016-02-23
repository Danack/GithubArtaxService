<?php 

namespace GithubService\Model;

class Permissions
{
    public $admin = null;

    public $pull = null;

    public $push = null;

    protected function getDataMap() {
        $dataMap = [
            ['admin', 'admin'],
            ['pull', 'pull'],
            ['push', 'push'],
        ];

        return $dataMap;
    }
}
