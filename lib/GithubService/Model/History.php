<?php 

namespace GithubService\Model;

class History
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $historyChild
     */
    public $historyChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['historyChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\HistoryChild'],
        ];

        return $dataMap;
    }
}
