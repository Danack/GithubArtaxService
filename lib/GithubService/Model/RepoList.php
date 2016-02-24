<?php 

namespace GithubService\Model;

class RepoList
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Ref $rEFSChild
     */
    public $repoList = array();

    protected function getDataMap() {
        $dataMap = [
            ['repoList', '', 'multiple' => true, 'class' => 'GithubService\\Model\\Repo'],
        ];

        return $dataMap;
    }
}
