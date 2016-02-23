<?php 

namespace GithubService\Model;

class RepoSearchItem
{
    public $created = null;

    public $createdAt = null;

    public $description = null;

    public $followers = null;

    public $fork = null;

    public $forks = null;

    public $hasDownloads = null;

    public $hasIssues = null;

    public $hasWiki = null;

    public $homepage = null;

    public $language = null;

    public $name = null;

    public $openIssues = null;

    public $owner = null;

    public $private = null;

    public $pushed = null;

    public $pushedAt = null;

    public $score = null;

    public $size = null;

    public $type = null;

    public $url = null;

    public $username = null;

    public $watchers = null;

    protected function getDataMap() {
        $dataMap = [
            ['created', 'created'],
            ['createdAt', 'created_at'],
            ['description', 'description'],
            ['followers', 'followers'],
            ['fork', 'fork'],
            ['forks', 'forks'],
            ['hasDownloads', 'has_downloads'],
            ['hasIssues', 'has_issues'],
            ['hasWiki', 'has_wiki'],
            ['homepage', 'homepage'],
            ['language', 'language'],
            ['name', 'name'],
            ['openIssues', 'open_issues'],
            ['owner', 'owner'],
            ['private', 'private'],
            ['pushed', 'pushed'],
            ['pushedAt', 'pushed_at'],
            ['score', 'score'],
            ['size', 'size'],
            ['type', 'type'],
            ['url', 'url'],
            ['username', 'username'],
            ['watchers', 'watchers'],
        ];

        return $dataMap;
    }
}
