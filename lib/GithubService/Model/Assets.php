<?php 

namespace GithubService\Model;

class Assets extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $assetsChild
     */
    public $assetsChild = array(
        
    );

    protected function getDataMap() {
        $dataMap = [
            ['assetsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\AssetsChild'],
        ];

        return $dataMap;
    }


}
