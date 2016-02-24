<?php 

namespace GithubService\Model;

class Tree
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $treeChild
     */
    public $treeChild = [];

    protected function getDataMap() {
        $dataMap = [
            ["truncated", "truncated",],
            ["url","url"],
            ["sha","sha"],
            ["treeChild", "tree", 'multiple' => true, 'class' => 'GithubService\\Model\\TreeChild']
        ];

        return $dataMap;
    }
}
