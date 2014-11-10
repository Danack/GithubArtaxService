<?php


//https://developer.github.com/v3/repos/
//List your repositories
//List user repositories
//List organization repositories
//List all public repositories
//Create
//Get
//Edit
//List contributors
//List languages
//List Teams
//List Tags
//List Branches
//Get Branch
//Delete a Repository



return array (


    //List your repositories
    'listRepositories' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/user/repos',
        'parameters' => array(
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of all, owner, public, private, member. Default: all",
            ),
            'sort' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of created, updated, pushed, full_name. Default: full_name",
            ),
            'direction' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of asc or desc. Default: when using full_name: asc; otherwise desc",
            ),
        ),
    ],

    //List user repositories
    'listUserRepositories' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/users/{username}/repos',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The user to fetch the repos for.",
            ),
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of all, owner, member. Default: owner",
            ),
            'sort' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of created, updated, pushed, full_name. Default: full_name",
            ),
            'direction' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of asc or desc. Default: when using full_name: asc, otherwise desc",
            ),
        ),
    ],
    
    //List organization repositories
    //GET 
    //type	string	Can be one of all, public, private, forks, sources, member. Default: all
    'listOrganizationRepositories' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/orgs/{organisation}/repos',
        'parameters' => array(
            'organisation' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The organisation to fetch the repos for.",
            ),
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of all, owner, member. Default: owner",
            ),
// These aren't listed in the Github documentation...they've got to exist though right?
//            'sort' => array(
//                "location" => "query",
//                'type' => 'string',
//                "description" => "Can be one of created, updated, pushed, full_name. Default: full_name",
//            ),
//            'direction' => array(
//                "location" => "query",
//                'type' => 'string',
//                "description" => "Can be one of asc or desc. Default: when using full_name: asc, otherwise desc",
//            ),
        ),
    ],
    
    //List all public repositories
    'listAllPublicRepositories' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repositories',
        'parameters' => array(
            'since' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "The integer ID of the last Repository that you’ve seen.",
            ),
    
        ),
    ],
    
    
    
    

//Create
//Create a new repository for the authenticated user.
//POST /user/repos
//When using OAuth, authorizations must include:
//
//public_repo scope or repo scope to create a public repository
//repo scope to create a private repository
//name	string	Required. The name of the repository
//description	string	A short description of the repository
//homepage	string	A URL with more information about the repository
//private	boolean	Either true to create a private repository, or false to create a public one. Creating private repositories requires a paid GitHub account. Default: false
//has_issues	boolean	Either true to enable issues for this repository, false to disable them. Default: true
//has_wiki	boolean	Either true to enable the wiki for this repository, false to disable it. Default: true
//has_downloads	boolean	Either true to enable downloads for this repository, false to disable them. Default: true
//team_id	number	The id of the team that will be granted access to this repository. This is only valid when creating a repository in an organization.
//auto_init	boolean	Pass true to create an initial commit with empty README. Default: false
//gitignore_template	string	Desired language or platform .gitignore template to apply. Use the name of the template without the extension. For example, “Haskell”. Ignored if the auto_init parameter is not provided.
//license_template	string	Desired LICENSE template to apply. Use the name of the template without the extension. For example, “mit” or “mozilla”. Ignored if the auto_init parameter is not provided.


    //List user repositories
    'getRepo' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/:owner/:repo',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The user to fetch the repos for.",
            ),
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of all, owner, member. Default: owner",
            ),
            'sort' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of created, updated, pushed, full_name. Default: full_name",
            ),
            'direction' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of asc or desc. Default: when using full_name: asc, otherwise desc",
            ),
        ),
    ],



//Edit
//PATCH /repos/:owner/:repo
//
//name	string	Required. The name of the repository
//description	string	A short description of the repository
//homepage	string	A URL with more information about the repository
//private	boolean	Either true to make the repository private, or false to make it public. Creating private repositories requires a paid GitHub account. Default: false
//has_issues	boolean	Either true to enable issues for this repository, false to disable them. Default: true
//has_wiki	boolean	Either true to enable the wiki for this repository, false to disable it. Default: true
//has_downloads	boolean	Either true to enable downloads for this repository, false to disable them. Default: true
//default_branch	String	Updates the default branch for this repository.
//

//
//{
//  "name": "Hello-World",
//  "description": "This is your first repository",
//  "homepage": "https://github.com",
//  "private": true,
//  "has_issues": true,
//  "has_wiki": true,
//  "has_downloads": true
//}




//GET 
//anon	string	Set to 1 or true to include anonymous contributors in results.

    //List contributors
    'getUserInfoByName' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/contributors',
        //'responseClass' => 'GithubService\Model\User',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The owner of the repo to fetch contributors for.",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The repo to fetch contributors for.",
            ),
            'anon' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Set to 1 or true to include anonymous contributors in results.",
            ),
        ),
    ],

    
    'listRepoLanguages' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/languages',
        'description' => 'List languages for the specified repository. The value on the right of a language is the number of bytes of code written in that language.',
        //'responseClass' => 'GithubService\Model\User',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The owner of the repo to fetch contributors for.",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The repo to fetch contributors for.",
            )
        ),
    ],


    
    'listRepoTeams' => [
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/teams',
        //'responseClass' => 'GithubService\Model\User',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The owner of the repo to fetch contributors for.",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The repo to fetch contributors for.",
            )
        ),
    ],

    /*
    'listRepoTagsPaginate' => array(
        'extends' => 'defaultGetOauthOperation',
        "responseClass" => 'GithubService\Model\RepoTags',
        'parameters' => array(
            'pageURL' => array(
                "location" => "absoluteURL",
            ),
        ),
    ), */


    //List Tags
    'listRepoTags' => array(
        'uri' => '/repos/{owner}/{repo}/tags',
        'extends' => 'defaultGetOauthOperation',
        
        'summary' => 'List tags for a repository. Response can be paged. This can be used either as a authed request (for private repos and higher rate limiting), or as unsigned, (public only, lower limit).',
        "responseClass" => 'GithubService\Model\RepoTags',
        //'exampleResponse' => $listRepoTagResponse,

        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
            )
        ),
    ),

    'listRepoBranches' => array(
        'uri' => '/repos/{owner}/{repo}/branches',
        'extends' => 'defaultGetOauthOperation',
 
        "responseClass" => 'GithubService\Model\RepoBranches',

        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
                'required' => 'true'
            )
        ),
    ),


    'getRepoBranch' => array(
        'uri' => '/repos/{owner}/{repo}/branches/{branch}',
        'extends' => 'defaultGetOauthOperation',

        "responseClass" => 'GithubService\Model\RepoBranch',

        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'branch' => array(
                "location" => "uri",
                'required' => 'true'
            )
        ),
    ),

    //TODO - disable this?
    'deleteRepo' => array(
        //Delete a Repository
        "httpMethod" => "DELETE", //returns Status: 204 No Content
        'uri' => '/repos/{owner}/{repo}',
        'extends' => 'defaultGetOauthOperation',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'required' => 'true'
            ),
            'repo' => array(
                "location" => "uri",
                'required' => 'true'
            )
        ),
    ),
);