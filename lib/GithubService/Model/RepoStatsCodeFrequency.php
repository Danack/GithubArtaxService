<?php 

namespace GithubService\Model;

class RepoStatsCodeFrequency extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Indices $rEPOSTATSCODEFREQUENCYChild
     */
    public $repoStats = [];

    protected function getDataMap() {
        $dataMap = [
            ['repoStats', '', 'multiple' => true, 'class' => 'GithubService\Model\RepoStatsCodeInfo'],
        ];

        return $dataMap;
    }
}
