<?php 

namespace GithubService\Model;

class DirectoryContent
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Content $dIRECTORYCONTENTChild
     */
    public $dIRECTORYCONTENTChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['dIRECTORYCONTENTChild', 'DIRECTORY_CONTENT_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Content'],
        ];

        return $dataMap;
    }
}
