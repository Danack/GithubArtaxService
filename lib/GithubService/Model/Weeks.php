<?php 

namespace GithubService\Model;

class Weeks
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $weeksChild
     */
    public $weeksChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['weeksChild', 'weeks_child', 'multiple' => true, 'class' => 'GithubService\\Model\\WeeksChild'],
        ];

        return $dataMap;
    }
}
