<?php 

namespace GithubService\Model;

class IssuesStats extends \GithubService\Model\DataMapper {

    public $open_issues;
    public $total_issues;
    public $closed_issues;

    protected function getDataMap() {
        $dataMap = [
            ["openIssues", "open_issues"],
            ["totalIssues", "total_issues"],
            ["closedIssues", "closed_issues"],
        ];

        return $dataMap;
    }
}
