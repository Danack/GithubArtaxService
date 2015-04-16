<?php 

namespace GithubService\Model;

class RepositoryInSearchResult extends \GithubService\Model\DataMapper {

    /**
     * @var \GithubService\Model\User $owner
     */
    public $owner = null;

    public $compare_url;
    public $comments_url;    
    public $hooks_url;    
    public $fork;    
    public $commits_url;    
    public $teams_url;    
    public $collaborators_url;    
    public $private;    
    public $contents_url;    
    public $git_commits_url;    
    public $git_refs_url;    
    public $blobs_url;    
    public $languages_url;    
    public $pulls_url;    
    public $downloads_url;    
    public $merges_url;    
    public $issue_comment_url;    
    public $git_tags_url;    
    public $branches_url;    
    public $issues_url;    
    public $trees_url;    
    public $events_url;    
    public $keys_url;    
    public $forks_url;    
    public $url;    
    public $milestones_url;    
    public $assignees_url;    
    public $description;    
    public $html_url;    
    public $id;    
    public $labels_url;    
    public $archive_url;    
    public $stargazers_url;    
    public $notifications_url;    
    public $subscription_url;    
    public $statuses_url;    
    public $issue_events_url;    
    public $subscribers_url;    
    public $contributors_url;    
    public $tags_url;    
    public $full_name;    
    public $name;    

    protected function getDataMap() {
        $dataMap = [
            ["compare_url", "compare_url"],
            ["comments_url", "comments_url"],
            ["hooks_url", "hooks_url"],
            ["fork", "fork"],
            ["commits_url", "commits_url"],
            ["teams_url", "teams_url"],
            ["collaborators_url", "collaborators_url"],
            ["private", "private"],
            ["contents_url", "contents_url"],
            ["git_commits_url", "git_commits_url"],
            ["git_refs_url", "git_refs_url"],
            ["blobs_url", "blobs_url"],
            ["languages_url", "languages_url"],
            ["pulls_url", "pulls_url"],
            ["downloads_url", "downloads_url"],
            ["merges_url", "merges_url"],
            ["issue_comment_url", "issue_comment_url"],
            ["git_tags_url", "git_tags_url"],
            ["branches_url", "branches_url"],
            ["issues_url", "issues_url"],
            ["trees_url", "trees_url"],
            ["events_url", "events_url"],
            ["keys_url", "keys_url"],
            ["forks_url", "forks_url"],
            ["url", "url"],
            ["milestones_url", "milestones_url"],
            ["assignees_url", "assignees_url"],
            ["description", "description"],
            ["html_url", "html_url"],
            ["id", "id"],
            ["labels_url", "labels_url"],
            ["archive_url", "archive_url"],
            ["stargazers_url", "stargazers_url"],
            ["notifications_url", "notifications_url"],
            ["subscription_url", "subscription_url"],
            ["statuses_url", "statuses_url"],
            ["issue_events_url", "issue_events_url"],
            ["subscribers_url", "subscribers_url"],
            ["contributors_url", "contributors_url"],
            ["tags_url", "tags_url"],
            ["full_name", "full_name"],
            ["name", "name"],
        ];

        return $dataMap;
    }

}
