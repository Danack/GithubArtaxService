<?php 

namespace GithubService\Model;

class Milestone
{
    use GithubTrait;
    use SafeAccess;
    
    public $closedAt = null;

    public $closedIssues = null;

    public $createdAt = null;

    /**
     * @var \GithubService\Model\User $creator
     */
    public $creator = null;

    public $description = null;

    public $dueOn = null;

    public $htmlUrl = null;

    public $id = null;

    public $labelsUrl = null;

    public $number = null;

    public $openIssues = null;

    public $state = null;

    public $title = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['closedAt', 'closed_at'],
            ['closedIssues', 'closed_issues'],
            ['createdAt', 'created_at'],
            ['creator', 'creator', 'class' => 'GithubService\\Model\\User'],
            ['description', 'description'],
            ['dueOn', 'due_on'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['labelsUrl', 'labels_url'],
            ['number', 'number'],
            ['openIssues', 'open_issues'],
            ['state', 'state'],
            ['title', 'title'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
