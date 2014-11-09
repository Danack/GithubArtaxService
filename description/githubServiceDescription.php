<?php

$userAgentParam = array(
    "location" => "header",
    "description" => "The user-agent which allows Github to recognise your application.",
    'sentAs' => 'User-Agent',
    //'required' => 'true'
);

$acceptParam = array(
    "location" => "header",
    "description" => "",
    'default' =>  'application/vnd.github.v3+json',
);


$service = array (

    "name" => "Github",
    "baseUrl" => "https://api.github.com",
    "description" => "Github API using Artax as a backend",
    "operations" => array(
        
        /*'defaultGetOperation' => array(
            "httpMethod" => "GET",
            "parameters" => array(
                'Accept' => $acceptParam,
                'userAgent' => $userAgentParam
            )
        ), */
        
        'defaultGetOauthOperation' => array(
            "httpMethod" => "GET",
            "parameters" => array(
                'Accept' => $acceptParam,
                'Authorization' => array(
                    "location" => "header",
                    "description" => "The token to use for the request. This should either be an a complete token in the format appropriate format e.g. 'token 123567890' for an oauth token, or '\"Basic \".base64_encode(\$username.\":\".\$password)\"' for a Basic token or anything that can be cast to a string in the correct format e.g. an  \ArtaxServiceBuilder\BasicAuthToken object." ,
                    'sentAs' => 'Authorization',
                    "filters" => array(
                        array(
                            "method" => 'GithubService\Github::castString',
                            "args" => ["@value"]
                        )
                    ),
                    'skipIfNull' => true,
                    'type' => 'string'
                ),
                'userAgent' => $userAgentParam,
                'perPage' => array(
                    "location" => "query",
                    "description" => "The number of items to get per page.",
                    'sentAs' => 'per_page',
                    'required' => 'false',
                    'type' => 'int',
                    'optional' => true
                ),
                'otp' => array(
                    "location" => "header",
                    "description" => "The one time password.",
                    'sentAs' => 'X-GitHub-OTP',
                    'optional' => true,
                ),
            )
        ),

        //accessToken
        //Accept: application/json
        'getOauthAuthorization' => [
            'uri' => 'https://github.com/login/oauth/access_token',
            'httpMethod' => 'POST',
            "responseClass" => 'GithubService\Model\AccessResponse',
            'summary' => 'Retrieve the Outh2 token for an application. You should have directed the user to https://github.com/login/oauth/authorize with client_id etc set before calling this.',
            'parameters' => [
                /* 'Accept' => array(
                    "location" => "header",
                    "description" => "",
                    'default' =>  'application/json',
                ), */
                'Accept' => $acceptParam,
                'userAgent' => $userAgentParam,
                'client_id' => [
                    'description' => 'string Required. The client ID you received from GitHub when you registered.',
                    'location' => 'query'
                ],
                'client_secret' => [
                    'description' => 'string Required. The client secret you received from GitHub when you registered.',
                    'location' => 'query'
                ],
                'code' => [
                    'description' => 'string Required. The code you received as a response to Step 1.',
                    'location' => 'query'
                ],
                'redirect_uri' => [
                    'location' => 'query',
                    'description' =>  'string The URL in your app where users will be sent after authorization. See details below about redirect urls.'
                ]
            ]
        ],

        'listRepoCommitsPaginate' => array(
            'extends' => 'defaultGetOauthOperation',
            "responseClass" => 'GithubService\Model\Commits',
            'parameters' => array(
                'pageURL' => array(
                    "location" => "absoluteURL",
                ),
            ),
        ),
    )
);


$externalFiles = array(
    "activity.php",
    "enterprise.php",
    "gists.php",
    "gitData.php",
    "issues.php",
    "miscellaneous.php",
    "oauth.php",
    "organizations.php",
    "pullRequests.php",
    "repositories.php",
    "repositoryCommits.php",
    "search.php",    
    "users.php",
    "usersEmails.php",
    "usersFollowers.php",
    "usersPublicKeys.php",
);


foreach ($externalFiles as $externalFile) {
    $repoOperations = require_once $externalFile;
    $service['operations'] = array_merge($service['operations'], $repoOperations);
}


return $service;