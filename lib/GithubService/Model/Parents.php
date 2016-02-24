<?php 

namespace GithubService\Model;

class Parents
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\BlobAfterCreate $parentsChild
     */
    public $parentsChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['parentsChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\BlobAfterCreate'],
        ];

        return $dataMap;
    }
}
