<?php 

namespace GithubService\Model;

class EmailSearchResults 
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\UserInSearchResult
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['user', 'user', 'class' => 'GithubService\\Model\\UserInSearchResult'],
        ];

        return $dataMap;
    }
}
