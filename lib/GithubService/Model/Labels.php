<?php 

namespace GithubService\Model;

class Labels extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $labelsChild
     */
    public $labelsChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['labelsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\LabelsChild'],
        ];

        return $dataMap;
    }


}
