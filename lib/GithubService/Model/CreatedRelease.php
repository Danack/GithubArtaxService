<?php 

namespace GithubService\Model;

class CreatedRelease
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Indices $assets
     */
    public $assets = array(
        
    );

    public $assetsUrl = null;

    /**
     * @var \GithubService\Model\User $author
     */
    public $author = null;

    public $body = null;

    public $createdAt = null;

    public $draft = null;

    public $htmlUrl = null;

    public $id = null;

    public $name = null;

    public $prerelease = null;

    public $publishedAt = null;

    public $tagName = null;

    public $tarballUrl = null;

    public $targetCommitish = null;

    public $uploadUrl = null;

    public $url = null;

    public $zipballUrl = null;

    protected function getDataMap() {
        $dataMap = [
            ['assets', 'assets', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['assetsUrl', 'assets_url'],
            ['author', 'author', 'class' => 'GithubService\\Model\\User'],
            ['body', 'body'],
            ['createdAt', 'created_at'],
            ['draft', 'draft'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['name', 'name'],
            ['prerelease', 'prerelease'],
            ['publishedAt', 'published_at'],
            ['tagName', 'tag_name'],
            ['tarballUrl', 'tarball_url'],
            ['targetCommitish', 'target_commitish'],
            ['uploadUrl', 'upload_url'],
            ['url', 'url'],
            ['zipballUrl', 'zipball_url'],
        ];

        return $dataMap;
    }
}
