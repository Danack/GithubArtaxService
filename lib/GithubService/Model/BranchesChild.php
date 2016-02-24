<?php 

namespace GithubService\Model;

class BranchesChild
{
    use GithubTrait;
    use SafeAccess;

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
