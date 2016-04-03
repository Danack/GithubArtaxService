<?php 

namespace GithubService\Model;

class Commits
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Commit[] $commitsChild
     */
    public $commitsChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['commitsChild', 'commits_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Commit'],
        ];

        return $dataMap;
    }
}
