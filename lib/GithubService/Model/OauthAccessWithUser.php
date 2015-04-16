<?php 

namespace GithubService\Model;

class OauthAccessWithUser extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\App $app
     */
    public $app = null;

    public $createdAt = null;

    public $fingerprint = null;

    public $hashedToken = null;

    public $id = null;

    public $note = null;

    public $noteUrl = null;

    /**
     * @var \GithubService\Model\Indices $scopes
     */
    public $scopes = array(
        
    );

    public $token = null;

    public $tokenLastEight = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;

    protected function getDataMap() {
        $dataMap = [
            ['app', 'app', 'class' => 'GithubService\\Model\\App'],
            ['createdAt', 'created_at'],
            ['fingerprint', 'fingerprint'],
            ['hashedToken', 'hashed_token'],
            ['id', 'id'],
            ['note', 'note'],
            ['noteUrl', 'note_url'],
            ['scopes', 'scopes', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['token', 'token'],
            ['tokenLastEight', 'token_last_eight'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
            ['user', 'user', 'class' => 'GithubService\\Model\\User'],
        ];

        return $dataMap;
    }


}
