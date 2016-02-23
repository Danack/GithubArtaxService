<?php 

namespace GithubService\Model;

class IssueSearchResults
{
    /**
     * @var \GithubService\Model\ $issues
     */
    public $issues = null;

    protected function getDataMap() {
        $dataMap = [
            ['issues', 'issues', 'class' => 'GithubService\\Model\\Issues'],
        ];

        return $dataMap;
    }
}
