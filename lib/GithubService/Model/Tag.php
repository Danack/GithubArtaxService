<?php 

namespace GithubService\Model;

class Tag 
{
    /**
     * @var \GithubService\Model\BlobAfterCreate $commit
     */
    public $commit = null;

    public $name = null;

    public $tarballUrl = null;

    public $zipballUrl = null;

//    protected function getDataMap() {
//        $dataMap = [
//            ['commit', 'commit', 'class' => 'GithubService\\Model\\BlobAfterCreate'],
//            ['name', 'name'],
//            ['tarballUrl', 'tarball_url'],
//            ['zipballUrl', 'zipball_url'],
//        ];
//
//        return $dataMap;
//    }
}
