<?php 

namespace GithubService\Model;

class RepoList
{
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
