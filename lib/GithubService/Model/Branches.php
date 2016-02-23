<?php 

namespace GithubService\Model;

class Branches  {

    /**
     * @var \GithubService\Model\ $bRANCHESChild
     */
    public $branchList = [];

    protected function getDataMap() {
        $dataMap = [
            ['branchList', '', 'multiple' => true, 'class' => 'GithubService\\Model\\BranchCommit'],
        ];

        return $dataMap;
    }


}
