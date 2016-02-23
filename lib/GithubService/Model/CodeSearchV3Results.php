<?php 

namespace GithubService\Model;

class CodeSearchV3Results
{
    public $incompleteResults = null;

    /**
     * @var \GithubService\Model\ $items
     */
    public $items = null;

    public $totalCount = null;

    protected function getDataMap() {
        $dataMap = [
            ['incompleteResults', 'incomplete_results'],
            ['items', 'items', 'class' => 'GithubService\\Model\\Items'],
            ['totalCount', 'total_count'],
        ];

        return $dataMap;
    }
}
