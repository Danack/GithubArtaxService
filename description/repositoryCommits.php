<?php

//https://developer.github.com/v3/repos/commits/


return array(

    //List commits on a repository
    //https://developer.github.com/v3/repos/commits/#list-commits-on-a-repository
    


    //https://developer.github.com/v3/repos/commits/
    'listRepoCommits' => array(
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/commits',
        "responseClass" => 'GithubService\Model\Commits',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
            ),
            'repo' => array(
                "location" => "uri",
            ),
            'sha' => array(
                'description' => 'SHA or branch to start listing commits from.',
                'type' => 'string',
                'optional' => 'true'
            ),
            'path' => array(
                'description' => 'Only commits containing this file path will be returned.',
                'type' => 'string',
                'optional' => 'true'
            ),
            'author' => array(
                'description' => 'GitHub login or email address by which to filter by commit author.',
                'type' => 'string',
                'optional' => 'true'
            ),
            'since' => array(
                'description' => 'Only commits after this date will be returned. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.',
                'type' => 'string',
                'optional' => 'true'
            ),
            'until' => array(
                'description' => 'Only commits before this date will be returned. This is a timestamp in ISO 8601 format: YYYY-MM-DDTHH:MM:SSZ.',
                'type' => 'string',
                'optional' => 'true'
            ),
        ),
    ),



    //Get a single commit
    //https://developer.github.com/v3/repos/commits/#get-a-single-commit
    'getSingleCommit' => array(
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/commits/{sha}',
        "responseClass" => 'GithubService\Model\Commit',

        'parameters' => array(
            'owner' => array(
                "location" => "uri",
            ),
            'repo' => array(
                "location" => "uri",
            ),
            'sha' => array(
                "location" => "uri",
                'description' => 'SHA of the commit to get',
                'type' => 'string',
            ),
        ),
    ),
    


    //Compare two commits
    //https://developer.github.com/v3/repos/commits/#compare-two-commits
    //GET /repos/:owner/:repo/compare/:base...:head
    
);