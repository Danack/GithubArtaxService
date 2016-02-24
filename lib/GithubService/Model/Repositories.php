<?php 

namespace GithubService\Model;

class Repositories
{
    use GithubTrait;
    use SafeAccess;

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
