<?php


return array(


//Management of email addresses via the API requires that you are
//authenticated through basic auth or OAuth with the user scope.

    'listUserEmails' => array(
        "description" => "List email addresses for a user",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/user/emails',
        'responseClass' => 'GithubService\Model\UserEmail',
    ),


    'addUserEmail' => array(
        //## Add email address(es)
        //
        //{{#enterprise-only}}
        //
        //{{#warning}}
        //
        //If your GitHub Enterprise appliance has [LDAP Sync enabled](https://help.github.com/enterprise/2.1/admin/guides/user-management/using-ldap) and the option to synchronize emails enabled, this API is disabled and will return a `403` response. Users managed in LDAP won't be able to add an email address via the API with these options enabled.
        //
        //{{/warning}}
        //
        //{{/enterprise-only}}
        //
        //    POST /user/emails
        //
        //### Input
        //
        //You can post a single email address or an array of addresses:
        //
        //== json ["octocat@github.com", "support@github.com"] 
        //
        //### Response
        //
        //== headers 201 
        //== json [
        //  {
        //    "email" => "octocat@github.com",
        //    "primary" => false,
        //    "verified" => false
        //  },
        //  {
        //    "email" => "support@github.com",
        //    "primary" => false,
        //    "verified" => false
        //  },
        //] 
        
        "description" => "Add email address",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/user/emails',
        'httpMethod' => 'POST',
        'responseClass' => 'GithubService\Model\UserEmail',
        'parameters' => array(
            'username' => array(
                "location" => "json",
                'type' => 'string or array',
                "description" => "A single email address or an array of addresses",
                //== json ["octocat@github.com", "support@github.com"]
            ),
        ),
        



    ),
    'deleteUserEmail' => array(

        //## Delete email address(es)
        //
        //{{#enterprise-only}}
        //
        //{{#warning}}
        //
        //If your GitHub Enterprise appliance has [LDAP Sync enabled](https://help.github.com/enterprise/2.1/admin/guides/user-management/using-ldap) and the option to synchronize emails enabled, this API is disabled and will return a `403` response. Users managed in LDAP won't be able to remove an email address via the API with these options enabled.
        //
        //{{/warning}}
        //
        //{{/enterprise-only}}
        //
        //    DELETE /user/emails
        //
        //### Input
        //
        //You can include a single email address or an array of addresses:
        //
        //== json ["octocat@github.com", "support@github.com"] 
        //
        //### Response
        //
        //== headers 204 
        //
        //
        //[media-types]: /v3/media
    
    ),

);