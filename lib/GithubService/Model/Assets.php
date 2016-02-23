<?php 

namespace GithubService\Model;

class Assets
{
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
