<?php 

namespace GithubService\Model;

class GistHistory
{
    /**
     * @var \GithubService\Model\HistoryChild $gISTHISTORYChild
     */
    public $gistHistoryList = array();

    protected function getDataMap() {
        $dataMap = [
            ['gistHistoryList', '', 'multiple' => true, 'class' => 'GithubService\\Model\\HistoryChild'],
        ];

        return $dataMap;
    }
}
