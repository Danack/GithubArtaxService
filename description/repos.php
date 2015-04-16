<?php


return array(
 
    'listSelfRepos' => array(
        //## List your repositories
        //
        //List repositories for the authenticated user.
        //
        //Note that this currently does not include repositories owned by organizations
        //which the user can access. You can
        //[list your organizations](/v3/orgs/#list-your-organizations) and
        //[list organization repositories](/v3/repos/#list-organization-repositories)
        //separately.
        //
        //With the new Organization Permissions API (described below), this *will* include
        //repositories owned by organizations which the user can access. If you provide
        //the custom media type (described below), you won't need to use other APIs to
        //list the authenticated user's organization-owned repositories.
        //
        //<div class="alert">
        //  <p>
        //    We're currently offering a migration period allowing applications to opt in to the Organization Permissions API. This functionality will <a href="/changes/2015-02-24-more-time-to-prepare-for-the-breaking-changes-to-organization-permissions/">soon</a> apply to all API consumers. Please see the <a href="/changes/2015-01-07-prepare-for-organization-permissions-changes/">blog post</a> for full details.
        //  </p>
        //
        //  <p>
        //    To access the API during the migration period, you must provide a custom <a href="/v3/media">media type</a> in the <code>Accept</code> header:
        //    <pre>application/vnd.github.moondragon+json</pre>
        //  </p>
        //</div>
        //
        //    GET /user/repos
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`type`|`string` | Can be one of `all`, `owner`, `public`, `private`, `member`. Default: `all`
        //`sort`|`string` | Can be one of `created`, `updated`, `pushed`, `full_name`. Default: `full_name`
        //`direction`|`string` | Can be one of `asc` or `desc`. Default: when using `full_name`: `asc`; otherwise `desc`
        //
    ),
    'listUserRepos' => array(
        //## List user repositories
        //
        //List public repositories for the specified user.
        //
        //    GET /users/:username/repos
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|-------------
        //`type`|`string` | Can be one of `all`, `owner`, `member`. Default: `owner`
        //`sort`|`string` | Can be one of `created`, `updated`, `pushed`, `full_name`. Default: `full_name`
        //`direction`|`string` | Can be one of `asc` or `desc`. Default: when using `full_name`: `asc`, otherwise `desc`
        //
    ),
    'listOrgRepos' => array(
        //## List organization repositories
        //
        //List repositories for the specified org.
        //
        //    GET /orgs/:org/repos
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`type`|`string` | Can be one of `all`, `public`, `private`, `forks`, `sources`, `member`. Default: `all`
        //
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:repo) { |h| [h] } 
    ),
    
    'listPublicRepos' => array(
        //## List all public repositories
        //
        //This provides a dump of every public repository, in the order that they were created.
        //
        //Note: Pagination is powered exclusively by the `since` parameter.
        //Use the [Link header](/v3/#link-header) to get the URL for the next page of
        //repositories.
        //
        //    GET /repositories
        //
        //### Parameters
        //
        //Name | Type | Description
        //-----|------|--------------
        //`since`|`string`| The integer ID of the last Repository that you've seen.
        //
        //
        //### Response
        //
        //== headers 200, :pagination => { :next => 'https://api.github.com/repositories?since=364' } 
        //== json(:simple_repo) { |h| [h] } 
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
        //## Get
        //
        //    GET /repos/:owner/:repo
        //
        //### Response
        //
        //The `parent` and `source` objects are present when the repository is a fork.
        //`parent` is the repository this repository was forked from,
        //`source` is the ultimate source for the network.
        //
        //== headers 200 
        //== json :full_repo 
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
    ),
    
    'listRepoTeams' => array(
        //## List Teams
        //
        //    GET /repos/:owner/:repo/teams
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:team) { |h| [h] } 
    ),
    'listRepoTags' => array(
        //## List Tags
        //
        //    GET /repos/:owner/:repo/tags
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:tag) { |h| [h] } 
    ),
    'listRepoBranches' => array(
        //## List Branches
        //
        //    GET /repos/:owner/:repo/branches
        //
        //### Response
        //
        //== headers 200, :pagination => default_pagination_rels 
        //== json(:branches) 
    ),
    'getRepoBranch' => array(
        //## Get Branch
        //
        //    GET /repos/:owner/:repo/branches/:branch
        //
        //### Response
        //
        //== headers 200 
        //== json(:branch) 
    ),
    'deleteRepo' => array(
        //## Delete a Repository
        //
        //Deleting a repository requires admin access.  If OAuth is used, the
        //`delete_repo` scope is required.
        //
        //    DELETE /repos/:owner/:repo
        //
        //### Response
        //
        //== headers 204 
    ),
);
