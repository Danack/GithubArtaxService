<?php 

namespace GithubService\Model;

class Branch
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\ $commit
     */
    public $commit = null;

    /**
     * @var \GithubService\Model\ $links
     */
    public $links = null;

    public $name = null;

    protected function getDataMap() {
        $dataMap = [
            ['commit', 'commit', 'class' => 'GithubService\\Model\\Commit'],
            //TODO - renable links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],
            ['name', 'name'],
        ];

        return $dataMap;
    }
}
