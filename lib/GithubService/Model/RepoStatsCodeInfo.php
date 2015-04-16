<?php 

namespace GithubService\Model;

use GithubService\GithubArtaxService\GithubArtaxServiceException;

class RepoStatsCodeInfo {

    // Returns a weekly aggregate of the number of additions and deletions pushed to a repository.
    
    /**
     * @var \GithubService\Model\Indices $rEPOSTATSCODEFREQUENCYChild
     */
    public $startOfWeek = null;
    
    public $additions = null;
    
    public $deletions = null;

    static function createFromData($data) {
        $instance = new static();
        
        if (isset($data[0]) == false ||
            isset($data[1]) == false ||
            isset($data[2]) == false) {
            throw new GithubArtaxServiceException("Cannot create RepoStatsCodeInfo, data is missing.");
        }

        $instance->startOfWeek = $data[0];
        $instance->additions = $data[1];
        $instance->deletions = $data[2];
        
        return $instance;
    }


//    protected function getDataMap() {
//        $dataMap = [
//            ['repoStats', '', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
//        ];
//
//        return $dataMap;
//    }


}
