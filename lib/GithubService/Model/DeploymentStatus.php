<?php 

namespace GithubService\Model;

class DeploymentStatus extends \GithubService\Model\DataMapper {

    public $createdAt = null;

    /**
     * @var \GithubService\Model\User $creator
     */
    public $creator = null;

    /**
     * @var \GithubService\Model\ $deployment
     */
    public $deployment = null;

    public $deploymentUrl = null;

    public $description = null;

    public $id = null;

    public $repositoryUrl = null;

    public $state = null;

    public $targetUrl = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['createdAt', 'created_at'],
            ['creator', 'creator', 'class' => 'GithubService\\Model\\User'],
            ['deployment', 'deployment', 'class' => 'GithubService\\Model\\Deployment'],
            ['deploymentUrl', 'deployment_url'],
            ['description', 'description'],
            ['id', 'id'],
            ['repositoryUrl', 'repository_url'],
            ['state', 'state'],
            ['targetUrl', 'target_url'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
