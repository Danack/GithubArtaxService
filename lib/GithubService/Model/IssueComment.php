<?php 

namespace GithubService\Model;

class IssueComment
{
    use GithubTrait;
    use SafeAccess;
    
    public $body = null;

    public $createdAt = null;

    public $htmlUrl = null;

    public $id = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['body', 'body'],
            ['createdAt', 'created_at'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
