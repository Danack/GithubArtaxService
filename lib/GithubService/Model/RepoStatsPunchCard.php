<?php 

namespace GithubService\Model;

class RepoStatsPunchCard extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Indices $rEPOSTATSPUNCHCARDChild
     */
    public $entries = array(
        
    );

//Each array contains the day number, hour number, and number of commits:
//
//0-6: Sunday - Saturday
//0-23: Hour of day
//Number of commits
    
    protected function getDataMap() {
        $dataMap = [
            ['entries', '', 'multiple' => true, 'class' => 'GithubService\\Model\\RepoStatsPunchCardInfo'],
        ];

        return $dataMap;
    }


}
