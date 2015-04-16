<?php 

namespace GithubService\Model;

class RepoSearchResults extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $repositories
     */
    public $repositories = null;

    protected function getDataMap() {
        $dataMap = [
            ['repositories', 'repositories', 'class' => 'GithubService\\Model\\Repositories'],
        ];

        return $dataMap;
    }


}
