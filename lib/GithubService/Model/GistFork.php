<?php 

namespace GithubService\Model;

class GistFork 
{
    use GithubTrait;
    use SafeAccess;
    
    public $createdAt = null;
    public $id = null;
    public $updatedAt = null;
    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['id', 'id'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
