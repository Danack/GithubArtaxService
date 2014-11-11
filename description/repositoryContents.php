<?php

//https://developer.github.com/v3/repos/contents/


return array(

    //Update a file
    //https://developer.github.com/v3/repos/contents/#update-a-file
    'updateFile' => array(
        'extends' => 'defaultGetOauthOperation',
        'httpMethod' => 'PUT',
        'uri' => '/repos/{owner}/{repo}/contents/{path}',
        
        "responseClass" => 'GithubService\Model\Commits',
        'parameters' => array(
            'path' => array(
                'description' => 'The content path.',
                "location" => "uri",
            ),
            'owner' => array(
                "location" => "uri",
                'description' => '',
            ),
            'repo' => array(
                'description' => '',
                'type' => 'string'
            ),
            'content' => array(
                'description' => 'The updated file content, Base64 encoded.',
                'type' => 'string'
            ),
            'sha' => array(
                'description' => 'The blob SHA of the file being replaced.',
                'type' => 'string'
                //TODO - needs to be a function.
            ),
            'branch' => array(
                'description' => 'The branch name. Default: the repository’s default branch (usually master)',
                'type' => 'string'
            ),
            'message' => array(
                'description' => 'The commit message.',
                'type' => 'string'
            ),            
            'name' => array(
                'description' => 'The name of the author (or committer) of the commit',
                'type' => 'string',
                'optional' => 'true'
            ),
            'email' => array(
                'description' => 'The email of the author (or committer) of the commit',
                'type' => 'string',
                'optional' => 'true'
            ),
        ),
    ),
);