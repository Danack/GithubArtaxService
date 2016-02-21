<?php 

namespace GithubService\Model;

class CommitList extends \GithubService\Model\DataMapper {

    use GithubTrait;
    
    /**
     * @var \GithubService\Model\Commit $commitsChild
     */
    public $commitsChild = array(  
    );

    protected function getDataMap() {
        $dataMap = [
            ['commitsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\Commit'],
        ];

        return $dataMap;
    }
}