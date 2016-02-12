<?php


return array(
    'listGitIgnoreTemplates' => array(
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gitignore/templates',
        'description' => 'List available templates. List all templates available to pass as an option when creating a repository When you create a new GitHub repository via the API, you can specify a .gitignore template to apply to the repository upon creation. The .gitignore Templates API lists and fetches templates from the GitHub .gitignore repository.',
        'responseClass' => 'GithubService\Model\TemplateList',
    ),

    'getGitIgnoreTemplate' => array(
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/gitignore/templates/{type}',
        'parameters' => array(
            'type' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "Which template to get."
            ),
        ),
        'responseClass' => 'GithubService\Model\Template',
        'description' => 'Get a single template. The API also allows fetching the source of a single template.',
    ),        
    
    

        //Use the raw [media type][media-type] to get the raw contents.
        //
        //== headers 200 
        //<pre>
        //# Object files
        //*.o
        //
        //# Libraries
        //*.lib
        //*.a
        //
        //# Shared objects (inc. Windows DLLs)
        //*.dll
        //*.so
        //*.so.*
        //*.dylib
        //
        //# Executables
        //*.exe
        //*.out
        //*.app
        //</pre>
    
    //[what-is]: https://help.github.com/articles/ignoring-files
    //[templates-repo]: https://github.com/github/gitignore
    //[create-repo]: /v3/repos/#create
    //[media-type]: /v3/media/
);