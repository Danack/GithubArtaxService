<?php 

namespace GithubService\Model;

class Forks
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $forksChild
     */
    public $forksChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['forksChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ForksChild'],
        ];

        return $dataMap;
    }
}
