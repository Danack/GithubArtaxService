<?php 

namespace GithubService\Model;

class Meta
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\Indices $git
     */
    public $git = [];

    public $githubServicesSha = null;

    /**
     * @var \GithubService\Model\Indices $hooks
     */
    public $hooks = array(
        
    );

    public $verifiablePasswordAuthentication = null;

    protected function getDataMap() {
        $dataMap = [
            ['git', 'git', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['githubServicesSha', 'github_services_sha'],
            ['hooks', 'hooks', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['verifiablePasswordAuthentication', 'verifiable_password_authentication'],
        ];

        return $dataMap;
    }
}
