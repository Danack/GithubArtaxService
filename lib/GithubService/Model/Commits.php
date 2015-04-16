<?php 

namespace GithubService\Model;

class Commits extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Commit $commitsChild
     */
    public $commitsChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['commitsChild', 'commits_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Commit'],
        ];

        return $dataMap;
    }


}
