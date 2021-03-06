<?php 

namespace GithubService\Model;

class Content
{
    use GithubTrait;
    use SafeAccess;

    public $downloadUrl = null;

    public $gitUrl = null;

    public $htmlUrl = null;

    /**
     * @var \GithubService\Model\ $links
     */
    public $links = null;

    public $name = null;

    public $path = null;

    public $sha = null;

    public $size = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['downloadUrl', 'download_url'],
            ['gitUrl', 'git_url'],
            ['htmlUrl', 'html_url'],
            //TODO restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['name', 'name'],
            ['path', 'path'],
            ['sha', 'sha'],
            ['size', 'size'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
