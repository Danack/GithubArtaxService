<?php


return array(

    'listUserPublicKeys' => array(
        //## List public keys for a user
        //
        //    GET /users/:username/keys
        //
        //Lists the _verified_ public keys for a user.  This is accessible by anyone.
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:simple_public_key) { |h| [h] } 
    ),
    
    'listSelfPublicKeys' => array(
        //## List your public keys
        //
        //    GET /user/keys
        //
        //Lists the current user's keys. Requires that you are authenticated via
        //Basic Auth or via OAuth with at least `read:public_key`
        //[scope](/v3/oauth/#scopes).
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:public_key) { |h| [h] } 
    ),

    'getPublicKey' => array(
        //## Get a single public key
        //
        //View extended details for a single public key. Requires that you are
        //authenticated via Basic Auth or via OAuth with at least `read:public_key`
        //[scope](/v3/oauth/#scopes).
        //
        //    GET /user/keys/:id
        //
        //### Response
        //
        //== headers 200 
        //== json :public_key 
    ),
    
    'createPublicKey' => array(
        //## Create a public key
        //
        //Creates a public key. Requires that you are authenticated via Basic Auth,
        //or OAuth with at least `write:public_key` [scope](/v3/oauth/#scopes).
        //
        //{{#enterprise-only}}
        //
        //{{#warning}}
        //
        //If your GitHub Enterprise appliance has [LDAP Sync enabled](https://help.github.com/enterprise/2.1/admin/guides/user-management/using-ldap) and the option to synchronize SSH keys enabled, this API is disabled and will return a `403` response. Users managed in LDAP won't be able to add an SSH key address via the API with these options enabled.
        //
        //{{/warning}}
        //
        //{{/enterprise-only}}
        //
        //    POST /user/keys
        //
        //### Input
        //
        //== json :title => "octocat@octomac", :key => "ssh-rsa AAA..." 
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:public_key)['url'] 
        //== json :public_key 
    ),
    
    'updatePublicKey' => array(
    //## Update a public key
    //
    //Public keys are immutable. If you need to update a public key, [remove the
    //key](#delete-a-public-key) and [create a new one](#create-a-public-key)
    //instead.
    ),
    
    'deletePublicKey' => array(
        //## Delete a public key
        //
        //Removes a public key. Requires that you are authenticated via Basic Auth
        //or via OAuth with at least `admin:public_key` [scope](/v3/oauth/#scopes).
        //
        //{{#enterprise-only}}
        //
        //{{#warning}}
        //
        //If your GitHub Enterprise appliance has [LDAP Sync enabled](https://help.github.com/enterprise/2.1/admin/guides/user-management/using-ldap) and the option to synchronize SSH keys enabled, this API is disabled and will return a `403` response. Users managed in LDAP won't be able to remove an SSH key address via the API with these options enabled.
        //
        //{{/warning}}
        //
        //{{/enterprise-only}}
        //
        //    DELETE /user/keys/:id
        //
        //### Response
        //
        //== headers 204 
    ),
);