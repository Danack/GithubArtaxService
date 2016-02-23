<?php 

namespace GithubService\Model;

class PrivateOrg
{
    public $avatarUrl = null;

    public $billingEmail = null;

    public $blog = null;

    public $collaborators = null;

    public $company = null;

    public $createdAt = null;

    public $description = null;

    public $diskUsage = null;

    public $email = null;

    public $followers = null;

    public $following = null;

    public $htmlUrl = null;

    public $id = null;

    public $location = null;

    public $login = null;

    public $name = null;

    public $ownedPrivateRepos = null;

    /**
     * @var \GithubService\Model\ $plan
     */
    public $plan = null;

    public $privateGists = null;

    public $publicGists = null;

    public $publicRepos = null;

    public $totalPrivateRepos = null;

    public $type = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['billingEmail', 'billing_email'],
            ['blog', 'blog'],
            ['collaborators', 'collaborators'],
            ['company', 'company'],
            ['createdAt', 'created_at'],
            ['description', 'description'],
            ['diskUsage', 'disk_usage'],
            ['email', 'email'],
            ['followers', 'followers'],
            ['following', 'following'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['location', 'location'],
            ['login', 'login'],
            ['name', 'name'],
            ['ownedPrivateRepos', 'owned_private_repos'],
            ['plan', 'plan', 'class' => 'GithubService\\Model\\Plan'],
            ['privateGists', 'private_gists'],
            ['publicGists', 'public_gists'],
            ['publicRepos', 'public_repos'],
            ['totalPrivateRepos', 'total_private_repos'],
            ['type', 'type'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
