<?php 

namespace GithubService\Model;

class Repository
{
    use GithubTrait;
    use SafeAccess;
    
    public $description = null;

    public $fork = null;

    public $fullName = null;

    public $htmlUrl = null;

    public $id = null;

    public $name = null;

    /**
     * @var \GithubService\Model\User $owner
     */
    public $owner = null;

    public $private = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['description', 'description'],
            ['fork', 'fork'],
            ['fullName', 'full_name'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['name', 'name'],
            ['owner', 'owner', 'class' => 'GithubService\\Model\\User'],
            ['private', 'private'],
            ['url', 'url'],
        ];

        return $dataMap;
    }
}
