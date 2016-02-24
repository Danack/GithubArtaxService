<?php 

namespace GithubService\Model;

class Permissions
{
    use GithubTrait;
    use SafeAccess;
    
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
