<?php


return array(

    //## Authentication
    //
    //You can read public gists and create them for anonymous users without a token; however, to read or write gists on a user's behalf the **gist** [OAuth scope][1] is required.
    //
    //<!-- When an OAuth client does not have the gists scope, the API will return a 404 "Not Found" response regardless of the validity of the credentials.
    //
    //The API will return a 401 "Bad credentials" response if the gists scope was given to the application but the credentials are invalid. -->
    //
    //## Truncation
    //
    //The Gist API provides up to one megabyte of content for each file in the gist. Every call to retrieve a gist through the API has a key called `truncated`. If `truncated` is `true`, the file is too large and only a portion of the contents were returned in `content`.
    //
    //If you need the full contents of the file, you can make a `GET` request to the URL specified by `raw_url`. Be aware that for files larger than ten megabytes, you'll need to clone the gist via the URL provided by `git_pull_url`.
    
    'listUsersGists' => array(
        "description" => "List a user's gists",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/users/{username}/gists',
        'responseClass' => 'GithubService\Model\GistList',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                'type' => 'string',
                //"description" => "",
            ),
        ),
    ),
        
    'listSelfGists' => array(
        "description" => "List the authenticated user's gists or if called anonymously, this will return all public gists",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists',
        'responseClass' => 'GithubService\Model\Gists',
    ),
        
    'listPublicGists' => array(
        "description" => "List all public gists",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/public',
        'responseClass' => 'GithubService\Model\Gists',
    ),

    'listSelfStarredGists' => array(
        //List the authenticated user's starred gists:
        //
        //    GET 
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`since`|`string` | A timestamp in ISO 8601 format: `YYYY-MM-DDTHH:MM:SSZ`. Only gists updated at or after this time are returned.
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        "description" => "",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/starred',
        'responseClass' => 'GithubService\Model\Gists',

    ),

    'getGist' => array(
        "description" => "Get a single gist",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}',
        'responseClass' => 'GithubService\Model\FullGist',

    ),
        
    'getGistByRevision' => array(
        "description" => "Get a specific revision of a gist",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/{sha}',
        'responseClass' => 'GithubService\Model\FullGist',
    ),
        
    'createGist' => array(
        //## Create a gist
        //
        //    POST /gists
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`files`|`object` | **Required**. Files that make up this gist.
        //`description`|`string` | A description of the gist.
        //`public`|`boolean` | Indicates whether the gist is public. Default: `false`
        //
        //The keys in the `files` object are the `string` filename, and the value is another `object` with a key of `content`, and a value of the file contents. For example:
        //
        //== json \
        //  :description => "the description for this gist",
        //  :public      => true,
        //  :files       => {
        //    "file1.txt" => {"content" => "String file contents"}
        //  }
        //
        //
        //<div class="alert">
        //  <p>
        //    <strong>Note</strong>: Don't name your files "gistfile" with a numerical suffix.  This is the format of the automatic naming scheme that Gist uses internally.
        //	</p>
        //</div>
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:full_gist)['url'] 
        //== json :full_gist 
        //
        //## Edit a gist
    ),

    'updateGist' => array(
        //    PATCH /gists/:id
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`description`|`string` | A description of the gist.
        //`files`|`object` | Files that make up this gist.
        //`content`|`string` | Updated file contents.
        //`filename`|`string` | New name for this file.
        //
        //The keys in the `files` object are the `string` filename. The value is another `object` with a key of `content` (indicating the new contents), or `filename` (indicating the new filename). For example:
        //
        //== json \
        //  :description => "the description for this gist",
        //  :files => {
        //    "file1.txt"    => {"content"  => "updated file contents"},
        //    "old_name.txt" => {"filename" => "new_name.txt", "content" => "modified contents"},
        //    "new_file.txt" => {"content"  => "a new file"},
        //    "delete_this_file.txt" => nil,
        //  } 
        //
        //<div class="alert">
        //  <p>
        //    <strong>Note</strong>: All files from the previous version of the gist are carried over by default if not included in the object. Deletes can be performed by including the filename with a <code>null</code> object.
        //	</p>
        //</div>
        //
        //
        //### Response
        //
        //== headers 200 
        //== json :full_gist 
        //'responseClass' => 'GithubService\Model\FullGist',
        ),
        
    'listGistCommits' => array(        
        //== headers 200, :pagination => { :next => 'https://api.github.com/resource?page=2' } 
        "description" => "List gist commits",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/commits',
        'responseClass' => 'GithubService\Model\GistHistory',

    ),
    'starGist' => array(
        //== headers 204 
        "description" => "Star a gist",
        'httpMethod' => 'PUT',
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/star',
    ),
    'unstarGist' => array(
        //== headers 204
        "description" => "Unstar a gist",
        'httpMethod' => 'DELETE',
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/star',
      
    ),
    'checkGistStarred' => array(
        //### Response if gist is starred
        //== headers 204 
        //### Response if gist is not starred
        //== headers 404
        "description" => "Check if a gist is starred",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/star',
        'responseClass' => 'GithubService\Model\GistStarred',
        'parameters' => array(
            'id' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The id of the gist to check",
            ),
        ),
    ),
    'forkGist' => array(
        //== headers 201, :Location => get_resource(:gist)['url'] 
        "description" => "Fork a gist",
        'extends' => 'defaultGetOauthOperation',
        'httpMethod' => 'POST',
        'uri' => '/gists/{id}/forks',
        'responseClass' => 'GithubService\Model\Gist',

    ),
    'listGistForks' => array(
        //== headers 200, :pagination => default_pagination_rels  
        "description" => "List gist forks",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}/forks',
        'responseClass' => 'GithubService\Model\GistForks',
    ),
    'deleteGist' => array(
        //== headers 204 
        "description" => "Delete a gist",
        'httpMethod' => 'DELETE',
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gists/{id}',
    ),
);