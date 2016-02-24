<?php 

namespace GithubService\Model;

class Milestones
{
    use GithubTrait;
    use SafeAccess;
    
    public $closedMilestones = null;

    public $openMilestones = null;

    public $totalMilestones = null;

    protected function getDataMap() {
        $dataMap = [
            ['closedMilestones', 'closed_milestones'],
            ['openMilestones', 'open_milestones'],
            ['totalMilestones', 'total_milestones'],
        ];

        return $dataMap;
    }
}
