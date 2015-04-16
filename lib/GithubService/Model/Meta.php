<?php 

namespace GithubService\Model;

class Meta extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\Indices $git
     */
    public $git = array(
        
    );

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
