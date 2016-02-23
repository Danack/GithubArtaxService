<?php 

namespace GithubService\Model;

class DirectoryContent
{
    /**
     * @var \GithubService\Model\Content $dIRECTORYCONTENTChild
     */
    public $dIRECTORYCONTENTChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['dIRECTORYCONTENTChild', 'DIRECTORY_CONTENT_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Content'],
        ];

        return $dataMap;
    }
}
