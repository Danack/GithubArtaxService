<?php 

namespace GithubService\Model;

class TreeNew
{
    use GithubTrait;
    use SafeAccess;
    
    public $sha = null;

    /**
     * @var \GithubService\Model\Tree $tree
     */
    public $tree = [];

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['sha', 'sha'],
            ['tree', 'tree', 'class' => 'GithubService\\Model\\TreeChild', 'multiple' => true],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
