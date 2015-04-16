<?php


return array(
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
    //## List your authorizations
    //
    //    GET /authorizations
    //
    //### Response
    //
    //== headers 200, :pagination => default_pagination_rels 
    //== json(:oauth_access) { |h| [h.merge("token" => "")] } 
    //
    //## Get a single authorization
    //
    //    GET /authorizations/:id
    //
    //### Response
    //
    //== headers 200 
    //== json(:oauth_access) { |h| h.merge("token" => "") } 
    //
    //## Create a new authorization
    //
    //If you need a small number of tokens, implementing the [web flow](/v3/oauth/#web-application-flow)
    //can be cumbersome. Instead, tokens can be created using the OAuth Authorizations API using
    //[Basic Authentication](/v3/auth#basic-authentication). To create tokens for a particular OAuth application, you
    //must provide its client ID and secret, found on the OAuth application settings
    //page, linked from your [OAuth applications listing on GitHub][app-listing]. If your OAuth application intends to create multiple tokens for one user you should use `fingerprint` to differentiate between them. OAuth tokens
    //can also be created through the web UI via the [Application settings page][app-listing].
    //Read more about these tokens on the [GitHub Help page](https://help.github.com/articles/creating-an-access-token-for-command-line-use).
    //
    //    POST /authorizations
    //
    //### Parameters
    //
    //Name | Type | Description
    //-----|------|--------------
    //`scopes`|`array` | A list of scopes that this authorization is in.
    //`note`|`string` | **Required**. A note to remind you what the OAuth token is for.
    //`note_url`|`string` | A URL to remind you what app the OAuth token is for.
    //`client_id`|`string` | The 20 character OAuth app client key for which to create the token.
    //`client_secret`|`string` | The 40 character OAuth app client secret for which to create the token.
    //`fingerprint`|`string` | **This attribute is only available when using the [mirage-preview](#deprecation-notice) media type.** A unique string to distinguish an authorization from others created for the same client ID and user.
    //
    //
    //== json :scopes => ["public_repo"], :note => 'admin script' 
    //
    //### Response
    //
    //== headers 201, :Location => get_resource(:oauth_access)['url'] 
    //== json(:oauth_access) { |h| h.merge("fingerprint" => "") } 
    //
    //## Get-or-create an authorization for a specific app
    //
    //This method will create a new authorization for the specified OAuth application,
    //only if an authorization for that application doesn't already exist for the
    //user. The URL includes the 20 character client ID for the OAuth app that is
    //requesting the token. It returns the user's existing authorization for the
    //application if one is present. Otherwise, it creates and returns a new one.
    //
    //    PUT /authorizations/clients/:client_id
    //
    //### Parameters
    //
    //Name | Type | Description
    //-----|------|--------------
    //`client_secret`|`string`| **Required**. The 40 character OAuth app client secret associated with the client ID specified in the URL.
    //`scopes`|`array` | A list of scopes that this authorization is in.
    //`note`|`string` | A note to remind you what the OAuth token is for.
    //`note_url`|`string` | A URL to remind you what app the OAuth token is for.
    //`fingerprint`|`string` | **This attribute is only available when using the [mirage-preview](#deprecation-notice) media type.** A unique string to distinguish an authorization from others created for the same client and user. If provided, this API is functionally equivalent to [Get-or-create an authorization for a specific app and fingerprint](/v3/oauth_authorizations/#get-or-create-an-authorization-for-a-specific-app-and-fingerprint).
    //
    //
    //== json :client_secret => "abcdabcdabcdabcdabcdabcdabcdabcdabcdabcd", :scopes => ["public_repo"], :note => 'admin script' 
    //
    //### Response if returning a new token
    //
    //== headers 201, :Location => get_resource(:oauth_access)['url'] 
    //== json(:oauth_access) { |h| h.merge("fingerprint" => "") } 
    //
    //### Response if returning an existing token
    //
    //== headers 200, :Location => get_resource(:oauth_access)['url'] 
    //== json(:oauth_access) { |h| h.merge("token" => "", "fingerprint" => "") } 
    //
    //## Get-or-create an authorization for a specific app and fingerprint
    //
    //**This API method is only available when using the
    //[mirage-preview](#deprecation-notice) media type.**
    //This method will create a new authorization for the specified OAuth application,
    //only if an authorization for that application and fingerprint do not already
    //exist for the user. The URL includes the 20 character client ID for the OAuth
    //app that is requesting the token. `fingerprint` is a unique string to
    //distinguish an authorization from others created for the same client ID and
    //user. It returns the user's existing authorization for the application if one
    //is present. Otherwise, it creates and returns a new one.
    //
    //    PUT /authorizations/clients/:client_id/:fingerprint
    //
    //### Parameters
    //
    //Name | Type | Description
    //-----|------|--------------
    //`client_secret`|`string`| **Required**. The 40 character OAuth app client secret associated with the client ID specified in the URL.
    //`scopes`|`array` | A list of scopes that this authorization is in.
    //`note`|`string` | A note to remind you what the OAuth token is for.
    //`note_url`|`string` | A URL to remind you what app the OAuth token is for.
    //
    //
    //== json :client_secret => "abcdabcdabcdabcdabcdabcdabcdabcdabcdabcd", :scopes => ["public_repo"], :note => 'admin script' 
    //
    //### Response if returning a new token
    //
    //== headers 201, :Location => get_resource(:oauth_access)['url'] 
    //== json :oauth_access 
    //
    //### Response if returning an existing token
    //
    //== headers 200, :Location => get_resource(:oauth_access)['url'] 
    //== json(:oauth_access) { |h| h.merge("token" => "") } 
    //
    //## Update an existing authorization
    //
    //    PATCH /authorizations/:id
    //
    //### Parameters
    //
    //Name | Type | Description
    //-----|------|--------------
    //`scopes`|`array` | Replaces the authorization scopes with these.
    //`add_scopes`|`array` | A list of scopes to add to this authorization.
    //`remove_scopes`|`array` | A list of scopes to remove from this authorization.
    //`note`|`string` | A note to remind you what the OAuth token is for.
    //`note_url`|`string` | A URL to remind you what app the OAuth token is for.
    //`fingerprint`|`string` | **This attribute is only available when using the [mirage-preview](#deprecation-notice) media type.** A unique string to distinguish an authorization from others created for the same client ID and user.
    //
    //
    //You can only send one of these scope keys at a time.
    //
    //== json :add_scopes => ['repo'], :note => 'admin script' 
    //
    //### Response
    //
    //== headers 200 
    //== json(:oauth_access) { |h| h.merge("token" => "") } 
    //
    //## Delete an authorization
    //
    //    DELETE /authorizations/:id
    //
    //### Response
    //
    //== headers 204 
    //
    //## Check an authorization
    //
    //OAuth applications can use a special API method for checking OAuth token
    //validity without running afoul of normal rate limits for failed login attempts.
    //Authentication works differently with this particular endpoint. You must use
    //[Basic Authentication](/v3/auth#basic-authentication) when accessing it, where the username is the OAuth
    //application `client_id` and the password is its `client_secret`. Invalid tokens
    //will return `404 NOT FOUND`.
    //
    //    GET /applications/:client_id/tokens/:access_token
    //
    //### Response
    //
    //== headers 200 
    //== json(:oauth_access_with_user) 
    //
    //## Reset an authorization
    //
    //OAuth applications can use this API method to reset a valid OAuth token without
    //end user involvement.  Applications must save the "token" property in the
    //response, because changes take effect immediately. You must use
    //[Basic Authentication](/v3/auth#basic-authentication) when accessing it, where
    //the username is the OAuth application `client_id` and the password is its
    //`client_secret`. Invalid tokens will return `404 NOT FOUND`.
    //
    //    POST /applications/:client_id/tokens/:access_token
    //
    //### Response
    //
    //== headers 200 
    //== json(:oauth_access_with_user) 
    //
    //## Revoke all authorizations for an application
    //
    //OAuth application owners can revoke every token for an OAuth application. You
    //must use [Basic Authentication](/v3/auth#basic-authentication) when calling
    //this method. The username is the OAuth application `client_id` and the password
    //is its `client_secret`. Tokens are revoked via a background job, and it might
    //take a few minutes for the process to complete.
    //
    //    DELETE /applications/:client_id/tokens
    //
    //### Response
    //
    //== headers 204 
    //
    //## Revoke an authorization for an application
    //
    //OAuth application owners can also revoke a single token for an OAuth
    //application. You must use [Basic Authentication](/v3/auth#basic-authentication)
    //for this method, where the username is the OAuth application `client_id` and
    //  the password is its `client_secret`.
    //
    //    DELETE /applications/:client_id/tokens/:access_token
    //
    //### Response
    //
    //== headers 204 
    //
    //## More Information
    //
    //
    //It can be a little tricky to get started with OAuth. Here are a few
    //links that might be of help:
    //
    //* [OAuth 2 spec](http://tools.ietf.org/html/rfc6749)
    //* [Facebook Login API](http://developers.facebook.com/docs/technical-guides/login/)
    //* [Ruby OAuth2 lib](https://github.com/intridea/oauth2)
    //* [Simple Ruby/Sinatra example](https://gist.github.com/9fd1a6199da0465ec87c)
    //* [Python Flask example](https://gist.github.com/ib-lundgren/6507798) using [requests-oauthlib](https://github.com/requests/requests-oauthlib)
    //* [Simple Python example](https://gist.github.com/e3fbd47fbb7ee3c626bb) using [python-oauth2](https://github.com/dgouldin/python-oauth2)
    //* [Ruby OmniAuth example](https://github.com/intridea/omniauth)
    //* [Ruby Sinatra extension](https://github.com/atmos/sinatra_auth_github)
    //* [Ruby Warden strategy](https://github.com/atmos/warden-github)
    //
    //[app-listing]: https://github.com/settings/applications
    //[basics auth guide]: /guides/basics-of-authentication/
);