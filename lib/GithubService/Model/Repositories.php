<?php 

namespace GithubService\Model;

class Repositories extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\RepoSearchItem $repositoriesChild
     */
    public $repositoriesChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['repositoriesChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\RepoSearchItem'],
        ];

        return $dataMap;
    }
}
