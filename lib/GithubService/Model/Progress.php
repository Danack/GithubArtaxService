<?php 

namespace GithubService\Model;

class Progress extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $progressChild
     */
    public $progressChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['progressChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ProgressChild'],
        ];

        return $dataMap;
    }


}
