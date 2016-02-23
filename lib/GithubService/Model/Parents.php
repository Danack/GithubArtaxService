<?php 

namespace GithubService\Model;

class Parents
{
    /**
     * @var \GithubService\Model\BlobAfterCreate $parentsChild
     */
    public $parentsChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['parentsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\BlobAfterCreate'],
        ];

        return $dataMap;
    }
}
