<?php 

namespace GithubService\Model;

class ReadmeContent
{
    use GithubTrait;
    use SafeAccess;
    
    public $content = null;

    public $downloadUrl = null;

    public $encoding = null;

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

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['content', 'content'],
            ['downloadUrl', 'download_url'],
            ['encoding', 'encoding'],
            ['gitUrl', 'git_url'],
            ['htmlUrl', 'html_url'],
            //TODO - redo links
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
