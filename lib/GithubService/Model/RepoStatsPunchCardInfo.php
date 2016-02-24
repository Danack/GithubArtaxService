<?php 

namespace GithubService\Model;

class RepoStatsPunchCardInfo
{
    use GithubTrait;
    use SafeAccess;
    
    public $day;
    
    public $hour;
    
    public $numberCommits;

//Each array contains the day number, hour number, and number of commits:
//
//0-6: Sunday - Saturday
//0-23: Hour of day
//Number of commits
    
    static function createFromData($data) {
        $instance = new static();

        $instance->day = $data[0];
        $instance->hour = $data[1];
        $instance->numberCommits = $data[2];

        return $instance;
    }
}
