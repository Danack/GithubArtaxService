<?php 

namespace GithubService\Model;

class IssueSearchItem extends \GithubService\Model\DataMapper {

    public $body = null;

    public $comments = null;

    public $createdAt = null;

    public $gravatarId = null;

    public $htmlUrl = null;

    /**
     * @var \GithubService\Model\Indices $labels
     */
    public $labels = array(
        
    );

    public $number = null;

    public $position = null;

    public $state = null;

    public $title = null;

    public $updatedAt = null;

    public $user = null;

    public $votes = null;

    protected function getDataMap() {
        $dataMap = [
            ['body', 'body'],
            ['comments', 'comments'],
            ['createdAt', 'created_at'],
            ['gravatarId', 'gravatar_id'],
            ['htmlUrl', 'html_url'],
            ['labels', 'labels', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['number', 'number'],
            ['position', 'position'],
            ['state', 'state'],
            ['title', 'title'],
            ['updatedAt', 'updated_at'],
            ['user', 'user'],
            ['votes', 'votes'],
        ];

        return $dataMap;
    }


}
