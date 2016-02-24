<?php 

namespace GithubService\Model;


class RepoStatsPunchCard
{
    use GithubTrait;
    use SafeAccess;
    /**
     * @var \GithubService\Model\RepoStatsPunchCardInfo[]
     */
    public $entries = [];

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
