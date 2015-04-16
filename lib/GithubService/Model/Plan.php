<?php 

namespace GithubService\Model;

class Plan extends \GithubService\Model\DataMapper {

    public $collaborators = null;

    public $name = null;

    public $privateRepos = null;

    public $space = null;

    protected function getDataMap() {
        $dataMap = [
            ['collaborators', 'collaborators'],
            ['name', 'name'],
            ['privateRepos', 'private_repos'],
            ['space', 'space'],
        ];

        return $dataMap;
    }


}
