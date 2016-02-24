<?php 

namespace GithubService\Model;

class DirectoryContentInfo
{
    use GithubTrait;
    use SafeAccess;
    
    protected function getDataMap() {
        $dataMap = [
            ['dIRECTORYCONTENTChild', 'DIRECTORY_CONTENT_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Content'],
        ];

        return $dataMap;
    }
}
