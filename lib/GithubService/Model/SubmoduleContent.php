<?php 

namespace GithubService\Model;

class SubmoduleContent
{
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

    public $submoduleGitUrl = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['downloadUrl', 'download_url'],
            ['gitUrl', 'git_url'],
            ['htmlUrl', 'html_url'],
            //TODO - restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['name', 'name'],
            ['path', 'path'],
            ['sha', 'sha'],
            ['size', 'size'],
            ['submoduleGitUrl', 'submodule_git_url'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
