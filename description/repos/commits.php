<?php

return array(

    'listRepoCommits' => array(
        //  headers 200, :pagination => { :next => 'https://api.github.com/resource?page=2' }
        "description" => "List commits on a repository.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/commits',
        'responseClass' => 'GithubService\Model\Commit',
        'parameters' => array(
            'sha' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "SHA or branch to start listing commits from. Default: the repository’s default branch (usually `master`).",
            ),
            'path' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "Only commits containing this file path will be returned.",
            ),
            'author' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "GitHub login or email address by which to filter by commit author.",
            ),
            'since' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "Only commits before this date will be returned. This is a timestamp in ISO 8601 format: `YYYY-MM-DDTHH:MM:SSZ`.",
            ),
            'until' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "Only commits after this date will be returned. This is a timestamp in ISO 8601 format: `YYYY-MM-DDTHH:MM:SSZ`.",
            ),
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
        ),  
    ),
    
    'getCommit' => array(
        "description" => "Get a single commit.     Note: Diffs with binary data will have no 'patch' property. Pass the appropriate [media type](/v3/media/#commits-commit-comparison-and-pull-requests) to fetch diff and patch formats.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/commits/:sha',
        'responseClass' => 'GithubService\Model\FullCommit',
    ),

    'compareTwoCommits' => array(
        "description" => "Compare two commits. Both `:base` and `:head` must be branch names in `:repo`.  ",
        'extends' => 'defaultGetOauthOperation',

        'uri' => '/repos/{owner}/{repo}/compare/{base}...{head}',
        'responseClass' => 'GithubService\Model\CommitComparison',
    ),
    
    'compareTwoCommitsForks' => array(
        "description" => "Compare two commits. Compare branches across other repositories in the same network as `:repo`, use the format `<USERNAME>:branch`.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/compare/{hubot}:{branchname}...{octocat}:{branchname}',
        'responseClass' => 'GithubService\Model\CommitComparison',
    ),



    //    GET 
    //
    //### Response
    //
    //The response from the API is equivalent to running the `git log base..head` command; however, commits are returned in reverse chronological order.
    //
    //== json :commit_comparison 
    //
    //Pass the appropriate [media type](/v3/media/#commits-commit-comparison-and-pull-requests) to fetch diff and patch formats.

    //### Working with large comparisons
    //
    //The response will include a comparison of up to 250 commits. If you are working with a larger commit range, you can use the [Commit List API](/v3/repos/commits/#list-commits-on-a-repository) to enumerate all commits in the range.
    //
    //For comparisons with extremely large diffs, you may receive an error response indicating that the diff took too long to generate. You can typically resolve this error by using a smaller commit range.
    
);