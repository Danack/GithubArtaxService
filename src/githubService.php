<?php


return array (

    "name" => "Github",
    "baseUrl" => "https://api.github.com",
    "description" => "Flickr API using Guzzle as a backend",
    "operations" => array(
        
        'defaultGetOperation' => array(
            "httpMethod" => "GET",
            "parameters" => array(
                'Accept' => array(
                    "location" => "header",
                    "description" => "",
                    'default' =>  'application/json',
                    //'default' =>  'application/vnd.github.v3+json',
                ),
                'userAgent' => array(
                    "location" => "header",
                    "description" => "The shitty oauth2 bearer token", ////: token OAUTH-TOKEN
                    'sentAs' => 'User-Agent'
                ),
            )
        ),

        'defaultGetOauthOperation' => array(
            "httpMethod" => "GET",
            "parameters" => array(
                'Accept' => array(
                    "location" => "header",
                    "description" => "",
                    'default' =>  'application/json',
                ),
                'Authorization' => array(
                    "location" => "header",
                    "description" => "The oauth2 bearer token", ////: token OAUTH-TOKEN
                ),
                'userAgent' => array(
                    "location" => "header",
                    "description" => "The shitty oauth2 bearer token", ////: token OAUTH-TOKEN
                    'sentAs' => 'User-Agent'
                ),
            )
        ),


//https://developer.github.com/v3/oauth_authorizations/

        'getAuthorizations' => array(
            'uri' => '/authorizations',
            'extends' => 'defaultGetOauthOperation',
            "responseClass" => 'GithubService\Model\Authorizations',

//            'parameters' => [
//                'client_id' => array(
//                    "location" => "uri",
//                    "description" => "The id of the client.",
//                ),
//            ]
        ),

        //Accept: application/json
        'accessToken' => [
            'extends' => 'defaultGetOperation',
            'uri' => 'https://github.com/login/oauth/access_token',
            'httpMethod' => 'POST',
            "responseClass" => 'GithubService\Model\AccessResponse',
            'parameters' => [
//                'client_id' => [
//                    'description' => 'string Required. The client ID you received from GitHub when you registered.',
//                    'location' => 'query'
//                ],
                'client_secret' => [
                    'description' => 'string Required. The client secret you received from GitHub when you registered.',
                    'location' => 'query'
                ],
                'code' => [
                    'description' =>  'string Required. The code you received as a response to Step 1.',
                    'location' => 'query'
                ],
                'redirect_uri' => [
                    'location' => 'query',
                    'description' =>  'string The URL in your app where users will be sent after authorization. See details below about redirect urls.'
                ]
            ]
        ],


        //https://developer.github.com/v3/oauth_authorizations/#revoke-all-authorizations-for-an-application
        
        'revokeAllAuthority' => [
            'extends' => 'defaultGetOauthOperation',
            'method' => 'DELETE',
            'uri' => '/applications/{client_id}/tokens',

            'parameters' => array(
                'client_id' => array(
                    "location" => "uri",
                    "description" => "The id of the client.",
                ),
            ),
        ],


        "getUserEmails" => array(
            "uri" => "https://api.github.com/user/emails",
            'extends' => 'defaultGetOauthOperation',
            'summary' => 'Get users email addresses',
            'responseClass' => 'GithubService\Model\Emails',
            'httpMethod' =>  'GET',
            'parameters' => array(
                //No parameters - it works off the oauth bearer token
            ),
        ),

        "addUserEmails" => array(
            "uri" => "https://api.github.com/user/emails",
            'extends' => 'defaultGetOauthOperation',
            'summary' => 'Get users email addresses',
            //TODO - It would be better to have scopes and permissions combined?
            'scopes' => [
                [\GithubService\Github::SCOPE_USER],
            ],
            
            'responseClass' => 'GithubService\Model\Emails',
            'httpMethod' =>  'POST',
            'parameters' => array(
                'emails' => array(
                    "location" => "json",
                    "description" => "Array of the emails to add",
                ),
            ),
        ),


        //List your repositories
        'listUserRepos' => array(
            'uri' => '/user/repos',
            'extends' => 'defaultGetOauthOperation',
            'summary' => 'List repositories for the authenticated user. Note that this does not include repositories owned by organizations which the user can access. You can list user organizations and list organization repositories separately.',
            'parameters' => array(
                'type' => array(
                    "location" => "json",
                    "description" => 'Can be one of all, owner, public, private, member. Default: all',
                    'default' => 'all',
                    'optional' => true,
                ),

                'sort' => array(
                    "location" => "json",
                    'type' => 'string',
                    'description' => 'Can be one of created, updated, pushed, full_name. Default: full_name',
                    
                    'default' => 'full_name',
                    'optional' => true,
                ),
                'direction' => array(
                    "location" => "json",
                    'type' => 'string',
                    'description' => 'Can be one of asc or desc. Default: when using full_name: asc; otherwise desc',
                    //Don't set a default value, github chooses a sensible default based on the 
                    //sort type
                    'optional' => true,
                ),
            )
        ),


        //Get a single user
        'getUserInfo' => [
            'extends' => 'defaultGetOauthOperation',
            'uri' => '/users/{username}',

            'parameters' => array(
                'username' => array(
                    "location" => "uri",
                    "description" => "The username of the client.",
                ),
            ),
        ],
        
        
        
//https://developer.github.com/v3/rate_limit/
        //GET /rate_limit
        /*
        
        {
  "resources": {
    "core": {
      "limit": 5000,
      "remaining": 4999,
      "reset": 1372700873
    },
    "search": {
      "limit": 20,
      "remaining": 18,
      "reset": 1372697452
    }
  },
  "rate": {
    "limit": 5000,
    "remaining": 4999,
    "reset": 1372700873
  }
}
        
        */
        
        

        
        //List user repositories
        //GET /users/:username/repos
        //        type	string	Can be one of all, owner, member. Default: owner
        //sort	string	Can be one of created, updated, pushed, full_name. Default: full_name
        //direction	string	Can be one of asc or desc. Default: when using full_name: asc, otherwise desc

        //List organization repositories
        //GET /orgs/:org/repos
        //type	string	Can be one of all, public, private, forks, sources, member. Default: all
        
        //List all public repositories
        //Note: Pagination is powered exclusively by the since parameter. Use the Link header to get the URL for the next page of repositories.
        //GET /repositories


        
        
        //Create
        //POST /user/repos
        
        
        //Get
        //GET /repos/:owner/:repo
        

        //Edit
        //PATCH /repos/:owner/:repo
//        name	string	Required. The name of the repository
//description	string	A short description of the repository
//homepage	string	A URL with more information about the repository
//private	boolean	Either true to make the repository private, or false to make it public. Creating private repositories requires a paid GitHub account. Default: false
//has_issues	boolean	Either true to enable issues for this repository, false to disable them. Default: true
//has_wiki	boolean	Either true to enable the wiki for this repository, false to disable it. Default: true
//has_downloads	boolean	Either true to enable downloads for this repository, false to disable them. Default: true
//default_branch	String	Updates the default branch for this repository.
        
        
        
        //List contributors
        //GET /repos/:owner/:repo/contributors

        //List languages
        //GET /repos/:owner/:repo/languages

        //List Teams
        //GET /repos/:owner/:repo/teams

        //List Tags
        //GET 
        'listRepoTags' => array(
            'uri' => '/repos/{owner}/{repo}/tags',  //'uri' => '/repos/:owner/:repo/tags',
            'extends' => 'defaultGetOauthOperation',
            'summary' => 'List tags for a repository. Response can be paged. This can be used either as a authed request (for private repos and higher rate limiting), or as unsigned, (public only, lower limit).',
            "responseClass" => 'GithubService\Model\RepoTags',

            'parameters' => array(
                'owner' => array(
                    "location" => "uri",
                ),
                'repo' => array(
                    "location" => "uri",
                )
            ),
        ),
        
        'listRepoCommitsPaginate' => array(
            'extends' => 'defaultGetOauthOperation',
            //'uri' => '{url}',
            "responseClass" => 'GithubService\Model\Commits',
            'parameters' => array(
                'pageURL' => array(
                    "location" => "absoluteURL",
                ),
            ),
        ),

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


        //GET 
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
        //List Branches
        //GET /repos/:owner/:repo/branches/:branch
    ),
);





// Github uses web base authentication for Oauth2... which means you don't need to sign the
// Authorisation request.
//        'authorize' => [
//            'uri' => 'https://github.com/login/oauth/authorize',
//            "responseClass" => 'AABTest\Github\AuthResponse',
//            "parameters" => [
//                'client_id' => [
//                    'description' => 'string The client ID you received from GitHub when you registered.',
//                ],
//                'redirect_uri' => [
//                    'description' => 'string The URL in your app where users will be sent after authorization. See details below about redirect urls.'
//                ],
//                'scope' => [
//                    'description' =>  'string A comma separated list of scopes. If not provided, scope defaults to an empty list of scopes for users that don’t have a valid token for the app. For users who do already have a valid token for the app, the user won’t be shown the OAuth authorization page with the list of scopes. Instead, this step of the flow will automatically complete with the same scopes that were used last time the user completed the flow.'],
//                'state' => [
//                    'description' => 'string An unguessable random string. It is used to protect against cross-site request forgery attacks.'
//                ],
//            ],
//        ],
//
// 