<?php 

namespace GithubService\Model;

class Assets
{
    use GithubTrait;
    use SafeAccess;

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
