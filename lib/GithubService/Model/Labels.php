<?php 

namespace GithubService\Model;

class Labels
{
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
