<?php 

namespace GithubService\Model;

class Forks
{
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
