<?php 

namespace GithubService\Model;

class Thread extends \GithubService\Model\DataMapper {

    public $id = null;

    public $lastReadAt = null;

    public $reason = null;

    /**
     * @var \GithubService\Model\Repository $repository
     */
    public $repository = null;

    /**
     * @var \GithubService\Model\ $subject
     */
    public $subject = null;

    public $unread = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['id', 'id'],
            ['lastReadAt', 'last_read_at'],
            ['reason', 'reason'],
            ['repository', 'repository', 'class' => 'GithubService\\Model\\Repository'],
            ['subject', 'subject', 'class' => 'GithubService\\Model\\Subject'],
            ['unread', 'unread'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}