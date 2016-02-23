<?php 

namespace GithubService\Model;

class Progress
{
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
