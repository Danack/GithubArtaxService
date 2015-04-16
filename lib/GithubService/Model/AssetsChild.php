<?php 

namespace GithubService\Model;

class AssetsChild extends \GithubService\Model\DataMapper {

    public $browserDownloadUrl = null;

    public $contentType = null;

    public $createdAt = null;

    public $downloadCount = null;

    public $id = null;

    public $label = null;

    public $name = null;

    public $size = null;

    public $state = null;

    public $updatedAt = null;

    /**
     * @var \GithubService\Model\User $uploader
     */
    public $uploader = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['browserDownloadUrl', 'browser_download_url'],
            ['contentType', 'content_type'],
            ['createdAt', 'created_at'],
            ['downloadCount', 'download_count'],
            ['id', 'id'],
            ['label', 'label'],
            ['name', 'name'],
            ['size', 'size'],
            ['state', 'state'],
            ['updatedAt', 'updated_at'],
            ['uploader', 'uploader', 'class' => 'GithubService\\Model\\User'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
