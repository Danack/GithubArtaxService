<?php 

namespace GithubService\Model;

class OauthAccess extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\ $app
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

    protected function getDataMap() {
        $dataMap = [
            ['app', 'app', 'class' => 'GithubService\\Model\\App'],
            ['createdAt', 'created_at'],
            ['fingerprint', 'fingerprint', 'optional' => true],
            ['hashedToken', 'hashed_token', 'optional' => true],
            ['id', 'id'],
            ['note', 'note'],
            ['noteUrl', 'note_url'],
            ['scopes', 'scopes', 'multiple' => true, 'class' => 'GithubService\\Model\\Indices'],
            ['token', 'token'],
            ['tokenLastEight', 'token_last_eight', 'optional' => true],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
