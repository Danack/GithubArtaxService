<?php 

namespace GithubService\Model;

class Tree extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $treeChild
     */
    public $treeChild = array(
        
    );

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