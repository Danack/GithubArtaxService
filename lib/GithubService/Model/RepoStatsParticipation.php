<?php 

namespace GithubService\Model;

class RepoStatsParticipation
{
    /**
     * @var \GithubService\Model\Indices $all
     */
    public $all = array(
        
    );

    /**
     * @var \GithubService\Model\Indices $owner
     */
    public $owner = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['all', 'all', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['owner', 'owner', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
        ];

        return $dataMap;
    }
}
