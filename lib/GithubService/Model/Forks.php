<?php 

namespace GithubService\Model;

class Forks extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $forksChild
     */
    public $forksChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['forksChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ForksChild'],
        ];

        return $dataMap;
    }


}
