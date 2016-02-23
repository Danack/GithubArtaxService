<?php 

namespace GithubService\Model;

class Issues
{
    /**
     * @var \GithubService\Model\IssueSearchItem $issuesChild
     */
    public $issuesChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['issuesChild', 'issues_child', 'multiple' => true, 'class' => 'GithubService\\Model\\IssueSearchItem'],
        ];

        return $dataMap;
    }
}
