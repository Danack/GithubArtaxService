<?php 

namespace GithubService\Model;

class History
{
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
