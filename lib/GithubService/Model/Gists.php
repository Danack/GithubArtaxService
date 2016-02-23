<?php 

namespace GithubService\Model;

class Gists
{
    public $privateGists = null;

    public $publicGists = null;

    public $totalGists = null;

    protected function getDataMap() {
        $dataMap = [
            ['privateGists', 'private_gists'],
            ['publicGists', 'public_gists'],
            ['totalGists', 'total_gists'],
        ];

        return $dataMap;
    }
}
