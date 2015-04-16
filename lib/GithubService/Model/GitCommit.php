<?php 

namespace GithubService\Model;

class GitCommit extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Author $author
     */
    public $author = null;

    /**
     * @var \GithubService\Model\Author $committer
     */
    public $committer = null;

    public $message = null;

    /**
     * @var \GithubService\Model\Parents $parents
     */
    public $parents = null;

    public $sha = null;

    /**
     * @var \GithubService\Model\BlobAfterCreate $tree
     */
    public $tree = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['author', 'author', 'class' => 'GithubService\\Model\\Author'],
            ['committer', 'committer', 'class' => 'GithubService\\Model\\Author'],
            ['message', 'message'],
            ['parents', 'parents', 'class' => 'GithubService\\Model\\Parents'],
            ['sha', 'sha'],
            ['tree', 'tree', 'class' => 'GithubService\\Model\\BlobAfterCreate'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
