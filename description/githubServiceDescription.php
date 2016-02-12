<?php

$userAgentParam = array(
    "location" => "header",
    "description" => "The user-agent which allows Github to recognise your application.",
    'sentAs' => 'User-Agent',
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

        'defaultGetOauthOperation' => array(
            "httpMethod" => "GET",
            "parameters" => array(
                'Accept' => $acceptParam,
                'Authorization' => array(
                    "location" => "header",
                    "description" => "The token to use for the request. This should either be an a complete token in the format appropriate format e.g. 'token 123567890' for an oauth token, or '\"Basic \".base64_encode(\$username.\":\".\$password)\"' for a Basic token or anything that can be cast to a string in the correct format e.g. an  \\ArtaxServiceBuilder\\BasicAuthToken object." ,
                    'sentAs' => 'Authorization',
                    "filters" => array(
                        array(
                            "method" => 'strval',
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

        'getOauthAuthorization' => [
            'uri' => 'https://github.com/login/oauth/access_token',
            'httpMethod' => 'POST',
            "responseClass" => 'GithubService\Model\AccessResponse',
            'summary' => 'Retrieve the Outh2 token for an application. You should have directed the user to https://github.com/login/oauth/authorize with client_id etc set before calling this.',
            'parameters' => [
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

        'genericPaginate' => array(
            'extends' => 'defaultGetOauthOperation',
            'parameters' => array(
                'pageURL' => array(
                    "location" => "absoluteURL",
                ),
            ),
        ),
    )
);


$externalFiles = array(


    "activity/events/types.php",
    "activity/events.php",
    "activity/feeds.php",
    "activity/notifications.php",
    "activity/starring.php",
    "activity/watching.php",
    "emojis.php",
//    "enterprise/admin_stats.php",
//    "enterprise/ldap.php",
//    "enterprise/license.php",
//    "enterprise/management_console.php",
//    "enterprise/search_indexing.php",
    "gists/comments.php",
    "gists.php",
    "git/blobs.php",
    "git/commits.php",
    "git/refs.php",
    "git/tags.php",
    "git/trees.php",
    "gitignore.php",
    "issues/assignees.php",
    "issues/comments.php",
    "issues/events.php",
    "issues/labels.php",
    "issues/milestones.php",
    "issues.php",
    "licenses.php",
    "markdown.php",
    "meta.php",
    "oauth_authorizations.php",
//    "orgs/hooks.php",
//    "orgs/members.php",
//    "orgs/teams.php",
//    "orgs.php",
    "pulls/comments.php",
    "pulls.php",
    "repos/collaborators.php",
    "repos/comments.php",
    "repos/commits.php",
    "repos/contents.php",
    "repos/deployments.php",
    "repos/downloads.php",
    "repos/forks.php",
    "repos/hooks.php",
    "repos/keys.php",
    "repos/merging.php",
    "repos/pages.php",
    "repos/releases.php",
    "repos/statistics.php",
    "repos/statuses.php",
    "repos.php",
    //"search/legacy.php",
    "search.php",
//    "users/administration.php",
//    "users/emails.php",
//    "users/followers.php",
//    "users/keys.php",
//    "users.php",


);


foreach ($externalFiles as $externalFile) {
    $repoOperations = require $externalFile;
    
    if (is_array($repoOperations) == false) {
        echo $externalFile." is borked";
        exit(0);
    }
    
    $service['operations'] = array_merge($service['operations'], $repoOperations);
}

return $service;


function expandGithub($command) {

    if (array_key_exists('url', $command) == false) {
        return $command;
    }

    $url = $command['url'];
    $modifiedURL = $url;

    preg_match_all('#:(\w*)#', $url, $matches, PREG_OFFSET_CAPTURE);

    $captures = $matches[0];
    $params = $matches[1];

    $parameters = [];

    for ($i=0 ; $i<count($captures) ; $i++) {
        $capture = $captures[$i];
        $search = $capture[0];
        $param = $params[$i];

        $name = $param[0];
        $replace = '{'.$name.'}';
        $modifiedURL = str_replace($search, $replace, $modifiedURL);

        $parameters[$name] = array(
            "location" => "uri",
        );
    }
    $newDetails = $command;


    $newDetails['parameters'] = $parameters;
    $newDetails['uri'] = $modifiedURL;

    return $newDetails;
}

