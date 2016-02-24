<?php 

namespace GithubService\Model;

class Tree
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $treeChild
     */
    public $treeChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['treeChild', 'tree', 'multiple' => true, 'class' => 'GithubService\\Model\\TreeChild'],
        ];

        return $dataMap;
    }
}
