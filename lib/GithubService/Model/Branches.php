<?php 

namespace GithubService\Model;

class Branches
{
    use GithubTrait;
    use SafeAccess;

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
