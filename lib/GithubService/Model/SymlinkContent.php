<?php 

namespace GithubService\Model;

class SymlinkContent extends \GithubService\Model\DataMapper {

    public $downloadUrl = null;

    public $gitUrl = null;

    public $htmlUrl = null;

    /**
     * @var \GithubService\Model\Links $links
     */
    public $links = null;

    public $name = null;

    public $path = null;

    public $sha = null;

    public $size = null;

    public $target = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['downloadUrl', 'download_url'],
            ['gitUrl', 'git_url'],
            ['htmlUrl', 'html_url'],
            // TODO - renable links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['name', 'name'],
            ['path', 'path'],
            ['sha', 'sha'],
            ['size', 'size'],
            ['target', 'target'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
