<?php 

namespace GithubService\Model;

class EmailSearchResults 
{
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
