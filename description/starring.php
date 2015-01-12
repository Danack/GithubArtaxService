<?php

//https://developer.github.com/v3/activity/starring/

return array(
    //list stargazers
    //https://developer.github.com/v3/activity/starring/#list-stargazers
    'listStargazers' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/stargazers',
        'responseClass' => 'GithubService\Model\Users',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
            )
        ),
    ],
);