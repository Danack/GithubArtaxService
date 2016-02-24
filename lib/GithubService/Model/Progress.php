<?php 

namespace GithubService\Model;

class Progress
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $progressChild
     */
    public $progressChild = [];

    protected function getDataMap() {
        $dataMap = [
            ['progressChild', '', 'multiple' => true, 'class' => 'GithubService\\Model\\ProgressChild'],
        ];

        return $dataMap;
    }


}
