<?php 

namespace GithubService\Model;

class Download
{
    use GithubTrait;
    use SafeAccess;
    
    public $contentType = null;

    public $description = null;

    public $downloadCount = null;

    public $htmlUrl = null;

    public $id = null;

    public $name = null;

    public $size = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['contentType', 'content_type'],
            ['description', 'description'],
            ['downloadCount', 'download_count'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['name', 'name'],
            ['size', 'size'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
