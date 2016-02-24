<?php 

namespace GithubService\Model;

class Items
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $itemsChild
     */
    public $itemsChild = array();

    protected function getDataMap() {
        $dataMap = [
            ['itemsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\Item'],
        ];

        return $dataMap;
    }
}
