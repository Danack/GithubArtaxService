<?php 

namespace GithubService\Model;

class BranchesChild extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\BlobAfterCreate $commit
     */
    public $commit = null;

    public $name = null;

    protected function getDataMap() {
        $dataMap = [
            ['commit', 'commit', 'class' => 'GithubService\\Model\\BlobAfterCreate'],
            ['name', 'name'],
        ];

        return $dataMap;
    }


}
