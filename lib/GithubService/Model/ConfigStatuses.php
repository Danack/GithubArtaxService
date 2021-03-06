<?php 

namespace GithubService\Model;

class ConfigStatuses
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $progress
     */
    public $progress = null;

    public $status = null;

    protected function getDataMap() {
        $dataMap = [
            ['progress', 'progress', 'class' => 'GithubService\\Model\\Progress'],
            ['status', 'status'],
        ];

        return $dataMap;
    }
}
