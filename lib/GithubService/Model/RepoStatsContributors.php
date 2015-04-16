<?php 

namespace GithubService\Model;

class RepoStatsContributors extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $rEPOSTATSCONTRIBUTORSChild
     */
    public $contributors = array();

    protected function getDataMap() {
        $dataMap = [
            ['contributors', 'REPO_STATS_CONTRIBUTORS_child', 'multiple' => true, 'class' => 'GithubService\Model\RepoStatsContributorsChild'],
        ];

        return $dataMap;
    }


}
