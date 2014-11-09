<?php


//https://developer.github.com/v3/oauth_authorizations/

return array(

    //List your authorizations
    //https://developer.github.com/v3/oauth_authorizations/#list-your-authorizations
    //GET /authorizations
    'getAuthorizations' => array(
        'uri' => '/authorizations',
        'extends' => 'defaultGetOauthOperation',
        "responseClass" => 'GithubService\Model\Authorizations',
    ),

    'listAuthorizations' => array(
        'extends' => 'defaultGetOauthOperation',
        "httpMethod" => "GET",
        'uri' => '/authorizations',
        "responseClass" => 'GithubService\Model\Authorizations',
    ),

    'basicListAuthorizations' => array(
        "httpMethod" => "GET",
        'uri' => '/authorizations',
        "responseClass" => 'GithubService\Model\Authorizations',
        "parameters" => array(
            'Accept' => array(
                "location" => "header",
                "description" => "",
                'default' =>  'application/vnd.github.v3+json',
            ),
            'userAgent' => array(
                "location" => "header",
                "description" => "The user-agent which allows Github to recognise your application.",
                'sentAs' => 'User-Agent',
            ),
            'Authorization' => array(
                "location" => "header",
                "description" => "The basic auth.",
                "filters" => array(
                    array(
                        "method" => 'GithubService\Github::formatBasicAuthToken',
                        "args" => ["@value"]
                    )
                ),
            ),
            'otp' => array(
                "location" => "header",
                "description" => "The one time password.",
                'sentAs' => 'X-GitHub-OTP',
                'optional' => true,
            ),
        )
    ),




    //Get a single authorization
    //https://developer.github.com/v3/oauth_authorizations/#get-a-single-authorization
    //GET /authorizations/:id





    //Create a new authorization
    //https://developer.github.com/v3/oauth_authorizations/#create-a-new-authorization
    //POST /authorizations
    'createAuthToken' => [
        'extends' => 'defaultGetOauthOperation',
        'method' => 'POST',
        "responseClass" => 'GithubService\Model\Authorizations',
        'uri' => '/authorizations',
        'parameters' => array(
            'scopes' => [
                'description' => '',
                'location' => 'json'
            ],
            'note' => [
                'description' => '',
                'location' => 'json'
            ],
            'note_url' => [
                'description' => '',
                'location' => 'json'
            ],
        ),
    ],

    
    
//    'basicAuthToOauth' => array(
//        "httpMethod" => "POST",
//        'uri' => '/authorizations',
//
//        "responseClass" => 'GithubService\Model\Authorization',
//
//        "parameters" => array(
//            'Accept' => array(
//                "location" => "header",
//                "description" => "",
//                'default' =>  'application/vnd.github.v3+json',
//            ),
//            'userAgent' => array(
//                "location" => "header",
//                "description" => "The user-agent which allows Github to recognise your application.",
//                'sentAs' => 'User-Agent',
//            ),
//
//            'Authorization' => array(
//                "location" => "header",
//                "description" => "The basic auth.",
//                "filters" => array(
//                    array(
//                        "method" => 'GithubService\Github::formatBasicAuthToken',
//                        "args" => ["@value"]
//                    )
//                ),
//            ),
//            'scopes' => [
//                'description' => '',
//                'location' => 'json'
//            ],
//            'note' => [
//                'description' => '',
//                'location' => 'json'
//            ],
//            'note_url' => [
//                'description' => '',
//                'location' => 'json'
//            ],
//        )
//    ),

    //Get-or-create an authorization for a specific app
    //https://developer.github.com/v3/oauth_authorizations/#get-or-create-an-authorization-for-a-specific-app
    //PUT /authorizations/clients/:client_id
        
        
    //Update an existing authorization
    //https://developer.github.com/v3/oauth_authorizations/#update-an-existing-authorization
    //PATCH /authorizations/:id
    
    
    //Delete an authorization
    //https://developer.github.com/v3/oauth_authorizations/#delete-an-authorization
    //DELETE /authorizations/:id

    //Check an authorization
    //https://developer.github.com/v3/oauth_authorizations/#check-an-authorization
    //GET /applications/:client_id/tokens/:access_token
    
    //Reset an authorization
    //https://developer.github.com/v3/oauth_authorizations/#reset-an-authorization
    //POST /applications/:client_id/tokens/:access_token

    //Revoke all authorizations for an application
    //https://developer.github.com/v3/oauth_authorizations/#revoke-all-authorizations-for-an-application
    //DELETE /applications/:client_id/tokens
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
);



