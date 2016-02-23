<?php 

namespace GithubService\Model;

class PagesStats
{
    public $cname = null;

    public $custom404 = null;

    public $status = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['cname', 'cname'],
            ['custom404', 'custom_404'],
            ['status', 'status'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
