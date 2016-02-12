<?php


$repoParameters = array(
    'owner' => array(
        "location" => "uri",
        'type' => 'string',
        "description" => "",
    ),
    'repo' => array(
        "location" => "uri",
        'type' => 'string',
        "description" => "",
    ),
);


return array(
    'listSelfRepos' => array(
        "description" => "List your repositories. List repositories for the authenticated user.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/user/repos',
        'responseClass' => 'GithubService\Model\Repos',
        'parameters' => array(
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of `all`, `owner`, `member`. Default: `owner`",
                'required' => 'false'
            ),
            'sort' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of `created`, `updated`, `pushed`, `full_name`. Default: `full_name`",
                'required' => 'false'
            ),
            'direction' => array(
                "location" => "query",
                'type' => 'string',
                "description" => " Can be one of `asc` or `desc`. Default: when using `full_name`: `asc`, otherwise `desc`",
                'required' => 'false'
            ),
        ),
    ),
    'listUserRepos' => array(
        "description" => "List user repositories. List public repositories for the specified user.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/users/{username}/repos',
        'responseClass' => 'GithubService\Model\RepoList',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "The user to get the repos of.",
            ),
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of `all`, `owner`, `member`. Default: `owner`",
                'optional' => 'true'
            ),
            'sort' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of `created`, `updated`, `pushed`, `full_name`. Default: `full_name`",
                'optional' => 'true'
            ),
            'direction' => array(
                "location" => "query",
                'type' => 'string',
                "description" => " Can be one of `asc` or `desc`. Default: when using `full_name`: `asc`, otherwise `desc`",
                'optional' => 'true'
            ),
        ),
    ),
    'listOrgRepos' => array(
        //== headers 200, :pagination => default_pagination_rels 
        "description" => "List organization repositories. List repositories for the specified org.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/orgs/{org}/repos',
        'responseClass' => 'GithubService\Model\Repos',
        'parameters' => array(
            'org' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "The organisation to get the repos of.",
            ),
            'type' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "Can be one of `all`, `public`, `private`, `forks`, `sources`, `member`. Default: `all`",
            ),
        ),
    ),
    
    'listPublicRepos' => array(
        //== headers 200, :pagination => { :next => 'https://api.github.com/repositories?since=364' } 
        //== json(:simple_repo) { |h| [h] } 
        "description" => "List all public repositories. This provides a dump of every public repository, in the order that they were created.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/tags',
        'responseClass' => 'GithubService\Model\RepoSimpleList',
        'parameters' => array(
            'since' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "The integer ID of the last Repository that you've seen.",
            ),
        ),
    ),
    
    'createRepo' => array(
        //## Create
        //
        //Create a new repository for the authenticated user.
        //
        //    POST /user/repos
        //
        //Create a new repository in this organization. The authenticated user must
        //be a member of the specified organization.
        //
        //    POST /orgs/:org/repos
        //
        //### OAuth scope requirements
        //
        //When using [OAuth](/v3/oauth/#scopes), authorizations must include:
        //
        //- `public_repo` scope or `repo` scope to create a public repository
        //- `repo` scope to create a private repository
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`name`|`string` | **Required**. The name of the repository
        //`description`|`string` | A short description of the repository
        //`homepage`|`string` | A URL with more information about the repository
        //`private`|`boolean` | Either `true` to create a private repository, or `false` to create a public one. Creating private repositories requires a paid GitHub account.  Default: `false`
        //`has_issues`|`boolean` | Either `true` to enable issues for this repository, `false` to disable them. Default: `true`
        //`has_wiki`|`boolean` | Either `true` to enable the wiki for this repository, `false` to disable it. Default: `true`
        //`has_downloads`|`boolean` | Either `true` to enable downloads for this repository, `false` to disable them. Default: `true`
        //`team_id`|`number` | The id of the team that will be granted access to this repository. This is only valid when creating a repository in an organization.
        //`auto_init`|`boolean` | Pass `true` to create an initial commit with empty README. Default: `false`
        //`gitignore_template`|`string` | Desired language or platform [.gitignore template](https://github.com/github/gitignore) to apply. Use the name of the template without the extension. For example, "Haskell".
        //`license_template`|`string` | Desired [LICENSE template](https://github.com/github/choosealicense.com) to apply. Use the [name of the template](https://github.com/github/choosealicense.com/tree/gh-pages/_licenses) without the extension. For example, "mit" or "mozilla".
        //
        //#### Example
        //
        //== json \
        //  :name          => "Hello-World",
        //  :description   => "This is your first repository",
        //  :homepage      => "https://github.com",
        //  :private       => false,
        //  :has_issues    => true,
        //  :has_wiki      => true,
        //  :has_downloads => true
        //
        //
        //### Response
        //
        //== headers 201, :Location => get_resource(:repo)['url'] 
        //== json :repo 
    ),
    
    'getRepo' => array(
        "description" => "Get repo. The `parent` and `source` objects are present when the repository is a fork.
        `parent` is the repository this repository was forked from,
        `source` is the ultimate source for the network.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}',
        'responseClass' => 'GithubService\Model\FullRepo',
        'parameters' => $repoParameters
        
    ),
    
    'updateRepo' => array(
        //## Edit
        //
        //    PATCH /repos/:owner/:repo
        //
        //### Input
        //
        //Name | Type | Description
        //-----|------|--------------
        //`name`|`string` | **Required**. The name of the repository
        //`description`|`string` | A short description of the repository
        //`homepage`|`string` | A URL with more information about the repository
        //`private`|`boolean` | Either `true` to make the repository private, or `false` to make it public. Creating private repositories requires a paid GitHub account.  Default: `false`
        //`has_issues`|`boolean` | Either `true` to enable issues for this repository, `false` to disable them. Default: `true`
        //`has_wiki`|`boolean` |  Either `true` to enable the wiki for this repository, `false` to disable it. Default: `true`
        //`has_downloads`|`boolean` | Either `true` to enable downloads for this repository, `false` to disable them. Default: `true`
        //`default_branch`|`String` | Updates the default branch for this repository.
        //
        //#### Example
        //
        //== json \
        //  :name          => "Hello-World",
        //  :description   => "This is your first repository",
        //  :homepage      => "https://github.com",
        //  :private       => true,
        //  :has_issues    => true,
        //  :has_wiki      => true,
        //  :has_downloads => true
        //
        //
        //### Response
        //
        //== headers 200 
        //== json :full_repo 
    ),
    'listRepoContributors' => array(
        //## List contributors
        //
        //List contributors to the specified repository, sorted by the number of commits per contributor in descending order.
        //
        //    GET /repos/:owner/:repo/contributors
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|-------------
        //`anon`|`string` | Set to `1` or `true` to include anonymous contributors in results.
        //
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:contributor) { |h| [h] }
        "description" => "List contributors",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/tags',
        'responseClass' => 'GithubService\Model\Contributor',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
            'anon' => array(
                "location" => "query",
                'type' => 'string',
                "description" => "",
            ),
        ), 
    ),
    'listRepoLanguages' => array(
        //## List languages
        //
        //List languages for the specified repository. The value on the right of a language is the number of bytes of code written in that language.
        //
        //    GET /repos/:owner/:repo/languages
        //
        //### Response
        //
        //== headers 200 
        //== json \
        //  "C"      => 78769,
        //  "Python" => 7769
        "description" => "List languages. List languages for the specified repository. The value on the right of a language is the number of bytes of code written in that language.",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/languages',
        'responseClass' => 'GithubService\Model\Languages',
        'parameters' => $repoParameters
    ),
    
    'listRepoTeams' => array(
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:team) { |h| [h] } 
        "description" => "List Repo Teams",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/teams',
        'responseClass' => 'GithubService\Model\Teams',
        'parameters' => $repoParameters
    ),
    'listRepoTags' => array(
        //== headers 200, :pagination => default_pagination_rels 
        "description" => "List Repo Tags",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/tags',
        'responseClass' => 'GithubService\Model\Tags',
        'parameters' => $repoParameters
    ),
    'listRepoBranches' => array(
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:branches)
        "description" => "List Branches",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/{owner}/{repo}/branches',
        'responseClass' => 'GithubService\Model\Branches',
        'parameters' => $repoParameters
    ),
    'getRepoBranch' => array(
        "description" => "Get Branch",
        'extends' => 'defaultGetOauthOperation',
        'uri' => '/repos/:owner/:repo/branches/:branch',
        'responseClass' => 'GithubService\Model\Branch',
        'parameters' => array(
            'username' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
        ),
    ),
    'deleteRepo' => array(
        //== headers 204
        "description" => "Delete a Repository. Deleting a repository requires admin access.  If OAuth is used, the
        `delete_repo` scope is required.",
        'extends' => 'defaultGetOauthOperation',
        'httpMethod' => 'DELETE',
        'uri' => '/repos/{owner}/{repo}',
        'parameters' => array(
            'owner' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
            'repo' => array(
                "location" => "uri",
                'type' => 'string',
                "description" => "",
            ),
        ),
    ),
);
