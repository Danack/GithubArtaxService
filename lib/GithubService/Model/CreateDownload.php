<?php 

namespace GithubService\Model;

class CreateDownload extends \GithubService\Model\DataMapper {

    public $accesskeyid = null;

    public $acl = null;

    public $bucket = null;

    public $contentType = null;

    public $description = null;

    public $downloadCount = null;

    public $expirationdate = null;

    public $htmlUrl = null;

    public $id = null;

    public $mimeType = null;

    public $name = null;

    public $path = null;

    public $policy = null;

    public $prefix = null;

    public $redirect = null;

    public $s3Url = null;

    public $signature = null;

    public $size = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['accesskeyid', 'accesskeyid'],
            ['acl', 'acl'],
            ['bucket', 'bucket'],
            ['contentType', 'content_type'],
            ['description', 'description'],
            ['downloadCount', 'download_count'],
            ['expirationdate', 'expirationdate'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['mimeType', 'mime_type'],
            ['name', 'name'],
            ['path', 'path'],
            ['policy', 'policy'],
            ['prefix', 'prefix'],
            ['redirect', 'redirect'],
            ['s3Url', 's3_url'],
            ['signature', 'signature'],
            ['size', 'size'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
