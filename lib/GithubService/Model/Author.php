<?php 

namespace GithubService\Model;

class Author 
{
    public $date = null;

    public $email = null;

    public $name = null;

    protected function getDataMap() {
        $dataMap = [
            ['date', 'date'],
            ['email', 'email'],
            ['name', 'name'],
        ];

        return $dataMap;
    }
}
