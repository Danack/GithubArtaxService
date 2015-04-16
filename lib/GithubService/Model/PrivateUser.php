<?php 

namespace GithubService\Model;

class PrivateUser extends \GithubService\Model\DataMapper {

    public $avatarUrl = null;

    public $bio = null;

    public $blog = null;

    public $collaborators = null;

    public $company = null;

    public $createdAt = null;

    public $diskUsage = null;

    public $email = null;

    public $eventsUrl = null;

    public $followers = null;

    public $followersUrl = null;

    public $following = null;

    public $followingUrl = null;

    public $gistsUrl = null;

    public $gravatarId = null;

    public $hireable = null;

    public $htmlUrl = null;

    public $id = null;

    public $location = null;

    public $login = null;

    public $name = null;

    public $organizationsUrl = null;

    public $ownedPrivateRepos = null;

    /**
     * @var \GithubService\Model\ $plan
     */
    public $plan = null;

    public $privateGists = null;

    public $publicGists = null;

    public $publicRepos = null;

    public $receivedEventsUrl = null;

    public $reposUrl = null;

    public $siteAdmin = null;

    public $starredUrl = null;

    public $subscriptionsUrl = null;

    public $totalPrivateRepos = null;

    public $type = null;

    public $updatedAt = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['avatarUrl', 'avatar_url'],
            ['bio', 'bio'],
            ['blog', 'blog'],
            ['collaborators', 'collaborators'],
            ['company', 'company'],
            ['createdAt', 'created_at'],
            ['diskUsage', 'disk_usage'],
            ['email', 'email'],
            ['eventsUrl', 'events_url'],
            ['followers', 'followers'],
            ['followersUrl', 'followers_url'],
            ['following', 'following'],
            ['followingUrl', 'following_url'],
            ['gistsUrl', 'gists_url'],
            ['gravatarId', 'gravatar_id'],
            ['hireable', 'hireable'],
            ['htmlUrl', 'html_url'],
            ['id', 'id'],
            ['location', 'location'],
            ['login', 'login'],
            ['name', 'name'],
            ['organizationsUrl', 'organizations_url'],
            ['ownedPrivateRepos', 'owned_private_repos'],
            ['plan', 'plan', 'class' => 'GithubService\\Model\\Plan'],
            ['privateGists', 'private_gists'],
            ['publicGists', 'public_gists'],
            ['publicRepos', 'public_repos'],
            ['receivedEventsUrl', 'received_events_url'],
            ['reposUrl', 'repos_url'],
            ['siteAdmin', 'site_admin'],
            ['starredUrl', 'starred_url'],
            ['subscriptionsUrl', 'subscriptions_url'],
            ['totalPrivateRepos', 'total_private_repos'],
            ['type', 'type'],
            ['updatedAt', 'updated_at'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
