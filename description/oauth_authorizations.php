<?php


//https://developer.github.com/v3/oauth_authorizations/


//List your authorizations
//Get a single authorization
//Create a new authorization
//Get-or-create an authorization for a specific app
//                                   Get-or-create an authorization for a specific app and fingerprint
//Update an existing authorization
//Delete an authorization
//Check an authorization
//Reset an authorization
//Revoke all authorizations for an application
// Revoke an authorization for an application




return array(
    'stubBasicAuth' => array(
        'stub' => true,
        "parameters" => array(
            'Accept' => array(
                "location" => "header",
                "description" => "",
                //'default' => 'application/vnd.github.v3+json',
                'default' => 'application/vnd.github.mirage-preview+json'
            ),
            'userAgent' => array(
                "location" => "header",
                "description" => "The user-agent which allows Github to recognise your application.",
                'sentAs' => 'User-Agent',
            ),
            'Authorization' => array(
                "location" => "header",
                "description" => "The basic authentication token",
            ),
            'otp' => array(
                "location" => "header",
                "description" => "The one time password.",
                'sentAs' => 'X-GitHub-OTP',
                'optional' => true,
            ),
        )
    ),

    'getAuthorizations' => array(
        'uri' => '/authorizations',
        'description' => 'List your authorizations',
        'extends' => 'defaultGetOauthOperation',
        "responseClass" => 'GithubService\Model\OauthAccessList',
    ),

    'getAuthorization' => array(
        'uri' => '/authorizations/{id}',
        'description' => 'List your authorizations',
        'extends' => 'defaultGetOauthOperation',
        "responseClass" => 'GithubService\Model\OauthAccess',
        'parameters' => array(
            'id' => [
                'description' => 'Which authorization to get',
                'location' => 'uri'
            ],
        ),
    ),

    'createAuthorization' => [
        'description' => 'Create a new authorization',
        'extends' => 'stubBasicAuth',
        'httpMethod' => 'POST',
        "responseClass" => 'GithubService\Model\OauthAccess',
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
                'location' => 'json',
                'optional' => true
                
            ],
            'client_id' => [
                'description' => 'The 20 character OAuth app client key for which to create the token.',
                'location' => 'json',
                'optional' => true
            ],
            'client_secret' => [
                'description' => 'The 40 character OAuth app client secret for which to create the token.',
                'location' => 'json',
                'optional' => true
            ],
            'fingerprint' => [
                'description' => 'A unique string to distinguish an authorization from others created for the same client ID and user.',
                'location' => 'json',
                'optional' => true
            ],
        ),
        'status' => [201]
    ],

    'getOrCreateAuthorization' => [
        //### Response if returning a new token
        //== headers 201, :Location => get_resource(:oauth_access)['url'] 
        //== json(:oauth_access) { |h| h.merge("fingerprint" => "") } 

        //### Response if returning an existing token
        //== headers 200, :Location => get_resource(:oauth_access)['url'] 
        //== json(:oauth_access) { |h| h.merge("token" => "", "fingerprint" => "") } 

        'description' => 'Get-or-create an authorization for a specific app. This method will create a new authorization for the specified OAuth application, only if an authorization for that application doesn\'t already exist for the user. The URL includes the 20 character client ID for the OAuth app that is requesting the token. It returns the user\'s existing authorization for the application if one is present. Otherwise, it creates and returns a new one.',
        
        'extends' => 'stubBasicAuth',
        'httpMethod' => 'PUT',
        "responseClass" => 'GithubService\Model\OauthAccess',
        'uri' => '/authorizations/clients/{client_id}',
        'parameters' => array(
            'scopes' => [
                'description' => 'A list of scopes that this authorization is in.',
                'location' => 'json'
            ],
            'note' => [
                'description' => 'A note to remind you what the OAuth token is for.',
                'location' => 'json'
            ],
            'note_url' => [
                'description' => 'A URL to remind you what app the OAuth token is for.',
                'location' => 'json'
            ],
            'client_id' => [
                'description' => 'The 20 character OAuth app client key for which to create the token.',
                'location' => 'uri'
            ],
            'client_secret' => [
                'description' => 'The 40 character OAuth app client secret for which to create the token.',
                'location' => 'json',
                
            ],
            
        ),
        'status' => [200, 201]
    ],



    'getOrCreateAuthorizationForAppFingerprint' => array(
        //### Response if returning a new token
        //== headers 201, :Location => get_resource(:oauth_access)['url'] 
        //== json :oauth_access 

        //### Response if returning an existing token
        //== headers 200, :Location => get_resource(:oauth_access)['url'] 
        //== json(:oauth_access) { |h| h.merge("token" => "") } 

        'method' => 'PUT',
        'uri' => '/authorizations/clients/{client_id}/{fingerprint}',
        "responseClass" => 'GithubService\Model\OauthAccess',
        'parameters' => array(
            'client_secret' => array(
                'location' => 'json',
                'description' => 'The 40 character OAuth app client secret associated with the client ID specified in the URL.',
            ),
            'scopes' => array(
                'location' => 'json',
                'description' => 'A list of scopes that this authorization is in.',
            ),
            'note' => array(
                    'location' => 'json',
                    'description' => 'A note to remind you what the OAuth token is for.',
            ),
            'note_url' => array(
                'location' => 'json',
                'description' => 'A URL to remind you what app the OAuth token is for.',
            ),
            'fingerprint' => [
                'description' => 'This attribute is only available when using the [mirage-preview](#deprecation-notice) media type.** A unique string to distinguish an authorization from others created for the same client ID and user.',
                'location' => 'json'
            ],
        ),
        'description' => 'Get-or-create an authorization for a specific app and fingerprint. This method will create a new authorization for the specified OAuth application, only if an authorization for that application and fingerprint do not already exist for the user. The URL includes the 20 character client ID for the OAuth app that is requesting the token. `fingerprint` is a unique string to distinguish an authorization from others created for the same client ID and user. It returns the user\'s existing authorization for the application if one is present. Otherwise, it creates and returns a new one.'
    ),

    
    'updateAuthorization' => array(
        //DJA - wtf does this mean?
        //You can only send one of these scope keys at a time.
        //== json :add_scopes => ['repo'], :note => 'admin script' 

        'method' => 'PATCH',
        'uri' => '/authorizations/{id}',
        "responseClass" => 'GithubService\Model\OauthAccess',
        'parameters' => array(
            'scopes' => [
                'description' => 'Replaces the authorization scopes with these.',
                'location' => 'json'
            ],
            'add_scopes' => [
                'description' => 'A list of scopes to add to this authorization.',
                'location' => 'json'
            ],
            'remove_scopes' => [
                'description' => 'A list of scopes to remove from this authorization.',
                'location' => 'json'
            ],
            'note' => [
                'description' => 'A note to remind you what the OAuth token is for.',
                'location' => 'json'
            ],
            'note_url' => [
                'description' => 'A URL to remind you what app the OAuth token is for.',
                'location' => 'json'
            ],
            'fingerprint' => [
                'description' => '**This attribute is only available when using the [mirage-preview](#deprecation-notice) media type.** A unique string to distinguish an authorization from others created for the same client ID and user.',
                'location' => 'json'
            ],
        ),
        'description' => 'Update an existing authorization' 
    ),
    
    'deleteAuthorization' => array(
        'extends' => 'defaultGetOauthOperation',
        'method' => 'DELETE',
        'uri' => '/authorizations/{id}',
        'status' => [204],
        'description' => 'Delete an authorization'
    ),

    
    'checkAuthorization' => array(
        'extends' => 'stubBasicAuth',
        'method' => 'GET',
        "responseClass" => 'GithubService\Model\OauthAccessWithUser',
        'uri' => '/applications/{client_id}/tokens/{access_token}',
        'parameters' => array(
            'client_id' => array(
                "location" => "uri",
                "description" => "",
            ),
            'access_token' => array(
                "location" => "uri",
                "description" => "",
            ),
        ),
        'description' => 'Check an authorization OAuth applications can use a special API method for checking OAuth token validity without running afoul of normal rate limits for failed login attempts. Authentication works differently with this particular endpoint. You must use [Basic Authentication](/v3/auth#basic-authentication) when accessing it, where the username is the OAuth
application `client_id` and the password is its `client_secret`. Invalid tokens will return `404 NOT FOUND`.'
    ), 

    
    'resetAuthorization' => array(
        'method' => 'POST',
        'extends' => 'stubBasicAuth',
        'uri' => '/applications/{client_id}/tokens/{access_token}',
        "responseClass" => 'GithubService\Model\OauthAccessWithUser',

        'parameters' => array(
            'client_id' => array(
                "location" => "uri",
                "description" => "",
            ),
            'access_token' => array(
                "location" => "uri",
                "description" => "",
            ),
        ),

        'descrition' => 'Reset an authorization OAuth applications can use this API method to reset a valid OAuth token without end user involvement.  Applications must save the "token" property in the response, because changes take effect immediately. You must use [Basic Authentication](/v3/auth#basic-authentication) when accessing it, where the username is the OAuth application `client_id` and the password is its `client_secret`. Invalid tokens will return `404 NOT FOUND`.',
    ),

    'revokeAllAuthority' => [
        //== headers 204 
        'desription' => '
        Revoke all authorizations for an application. OAuth application owners can revoke every token for an OAuth application. You must use [Basic Authentication](/v3/auth#basic-authentication) when calling this method. The username is the OAuth application `client_id` and the password is its `client_secret`. Tokens are revoked via a background job, and it might take a few minutes for the process to complete.',
        'extends' => 'stubBasicAuth',
        'method' => 'DELETE',
        'uri' => '/applications/{client_id}/tokens',
        'parameters' => array(
            'client_id' => array(
                "location" => "uri",
                "description" => "The id of the client.",
            ),
        ),
        'status' => [204]
    ],

    'revokeAuthorityForApplication' => [
        'description' => '
        Revoke an authorization for an application
    
    OAuth application owners can also revoke a single token for an OAuth application. You must use [Basic Authentication](/v3/auth#basic-authentication) for this method, where the username is the OAuth application `client_id` and the password is its `client_secret`.',
        'extends' => 'stubBasicAuth',
        'method' => 'DELETE',
        'uri' => '/applications/{client_id}/tokens/{access_token}',
        'parameters' => array(
            'client_id' => array(
                "location" => "uri",
                "description" => "The id of the client.",
            ),
            'access_token' => array(
                "location" => "uri",
                "description" => "The access token to delete.",
            ),
        ),
        'status' => [204]
    ],
);










//
//---
//title: Authorizations | GitHub API
//---
//
//# OAuth Authorizations API
//
//* TOC
//{:toc}
//
//You can use this API to manage your OAuth applications. You can only access this API via [Basic Authentication](/v3/auth#basic-authentication) using your username and password, not tokens.
//
//Make sure you understand how to [work with two-factor authentication](/v3/auth/#working-with-two-factor-authentication) if you or your users have two-factor authentication enabled.
//
//<div class="alert">
//  <h3 id="deprecation-notice">Deprecation Notice</h3>
//
//  <p>
//    The <code>token</code> attribute is <a href="/v3/versions/#v3-deprecations">deprecated</a> in all
//    of the following OAuth Authorizations API responses:
//  </p>
//
//  <ul>
//    <li><a href="#list-your-authorizations">List your authorizations</a></li>
//    <li><a href="#get-a-single-authorization">Get a single authorization</a></li>
//    <li><a href="#get-or-create-an-authorization-for-a-specific-app">Get-or-create an authorization for a specific app</a> - <code>token</code> is still returned for "create" </li>
//    <li><a href="#get-or-create-an-authorization-for-a-specific-app-and-fingerprint">Get-or-create an authorization for a specific app and fingerprint</a> - <code>token</code> is still returned for "create" </li>
//    <li><a href="#update-an-existing-authorization">Update an existing authorization</a></li>
//  </ul>
//
//  <p>
//    We're currently offering a migration period allowing applications to opt in to the new Authorization API behavior. This functionality will apply to all API consumers beginning April 20, 2015. Please see <a href="/changes/2015-02-20-migration-period-removing-authorizations-token/">the blog post</a> for full details.
//  </p>
//
//  <p>
//    In order to reduce the impact of removing the <code>token</code> attribute,
//    the OAuth Authorizations API has added a new request attribute
//    (<code>fingerprint</code>), added three new response attributes
//    (<code>token_last_eight</code>, <code>hashed_token</code>, and
//    <code>fingerprint</code>), and added
//    <a href="#get-or-create-an-authorization-for-a-specific-app-and-fingerprint">one new API</a>.
//  </p>
//
//  <p>
//    To access the new API functionality during the migration period, you must
//    provide a custom <a href="/v3/media/">media type</a> in the
//    <code>Accept</code> header:
//    <pre>application/vnd.github.mirage-preview+json</pre>
//  </p>
//</div>
//