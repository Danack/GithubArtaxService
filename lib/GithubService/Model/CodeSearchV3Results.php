<?php 

namespace GithubService\Model;

class CodeSearchV3Results extends \GithubService\Model\DataMapper {

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
