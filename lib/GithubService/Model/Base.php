<?php 

namespace GithubService\Model;

class Base 
{
    use GithubTrait;
    use SafeAccess;

    public $label = null;

    public $ref = null;

    /**
     * @var \GithubService\Model\ $repo
     */
    public $repo = null;

    public $sha = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['label', 'label'],
            ['ref', 'ref'],
            ['repo', 'repo', 'class' => 'GithubService\\Model\\Repo'],
            ['sha', 'sha'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }
}
