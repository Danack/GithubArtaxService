<?php 

namespace GithubService\Model;

class DirectoryContentInfo extends \GithubService\Model\DataMapper {



    protected function getDataMap() {
        $dataMap = [
            ['dIRECTORYCONTENTChild', 'DIRECTORY_CONTENT_child', 'multiple' => true, 'class' => 'GithubService\\Model\\Content'],
        ];

        return $dataMap;
    }


}
