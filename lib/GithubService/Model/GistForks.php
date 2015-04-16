<?php 

namespace GithubService\Model;

class GistForks extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ForksChild $gistForklist
     */
    public $gistForklist = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['gistForklist', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ForksChild'],
        ];

        return $dataMap;
    }
}
