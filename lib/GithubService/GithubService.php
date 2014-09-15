<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService;

interface GithubService {

    /**
     * getAuthorizations
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getAuthorizations The new operation
     */
    public function getAuthorizations($Authorization);

    /**
     * accessToken
     *
     * @param mixed $client_id string Required. The client ID you received from GitHub
     * when you registered.
     * @param mixed $client_secret string Required. The client secret you received from
     * GitHub when you registered.
     * @param mixed $code string Required. The code you received as a response to Step
     * 1.
     * @param mixed $redirect_uri string The URL in your app where users will be sent
     * after authorization. See details below about redirect urls.
     * @return \GithubService\Operation\accessToken The new operation
     */
    public function accessToken($client_id, $client_secret, $code, $redirect_uri);

    /**
     * revokeAllAuthority
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $client_id The id of the client.
     * @return \GithubService\Operation\revokeAllAuthority The new operation
     */
    public function revokeAllAuthority($Authorization, $client_id);

    /**
     * getUserEmails
     *
     * Get users email addresses
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getUserEmails The new operation
     */
    public function getUserEmails($Authorization);

    /**
     * addUserEmails
     *
     * Get users email addresses
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $emails Array of the emails to add
     * @return \GithubService\Operation\addUserEmails The new operation
     */
    public function addUserEmails($Authorization, $emails);

    /**
     * listUserRepos
     *
     * List repositories for the authenticated user. Note that this does not include
     * repositories owned by organizations which the user can access. You can list user
     * organizations and list organization repositories separately.
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\listUserRepos The new operation
     */
    public function listUserRepos($Authorization);

    /**
     * getUserInfoByName
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $owner The owner of the repo to fetch contributors for.
     * @param string $repo The repo to fetch contributors for.
     * @param string $anon Set to 1 or true to include anonymous contributors in
     * results.
     * @return \GithubService\Operation\getUserInfoByName The new operation
     */
    public function getUserInfoByName($Authorization, $owner, $repo, $anon);

    /**
     * getUserInfo
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getUserInfo The new operation
     */
    public function getUserInfo($Authorization);

    /**
     * listRepoCommitsPaginate
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listRepoCommitsPaginate The new operation
     */
    public function listRepoCommitsPaginate($Authorization, $pageURL);

    /**
     * listRepoCommits
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoCommits The new operation
     */
    public function listRepoCommits($Authorization, $owner, $repo);

    /**
     * getSingleCommit
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @param string $sha SHA of the commit to get
     * @return \GithubService\Operation\getSingleCommit The new operation
     */
    public function getSingleCommit($Authorization, $owner, $repo, $sha);

    /**
     * listRepositories
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $type Can be one of all, owner, public, private, member. Default:
     * all
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc; otherwise desc
     * @return \GithubService\Operation\listRepositories The new operation
     */
    public function listRepositories($Authorization, $type, $sort, $direction);

    /**
     * listUserRepositories
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $username The user to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc, otherwise desc
     * @return \GithubService\Operation\listUserRepositories The new operation
     */
    public function listUserRepositories($Authorization, $username, $type, $sort, $direction);

    /**
     * listOrganizationRepositories
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $organisation The organisation to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @return \GithubService\Operation\listOrganizationRepositories The new operation
     */
    public function listOrganizationRepositories($Authorization, $organisation, $type);

    /**
     * listAllPublicRepositories
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $since The integer ID of the last Repository that you’ve seen.
     * @return \GithubService\Operation\listAllPublicRepositories The new operation
     */
    public function listAllPublicRepositories($Authorization, $since);

    /**
     * getRepo
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $username The user to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc, otherwise desc
     * @return \GithubService\Operation\getRepo The new operation
     */
    public function getRepo($Authorization, $username, $type, $sort, $direction);

    /**
     * listRepoLanguages
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $owner The owner of the repo to fetch contributors for.
     * @param string $repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoLanguages The new operation
     */
    public function listRepoLanguages($Authorization, $owner, $repo);

    /**
     * listRepoTeams
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param string $owner The owner of the repo to fetch contributors for.
     * @param string $repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoTeams The new operation
     */
    public function listRepoTeams($Authorization, $owner, $repo);

    /**
     * listRepoTagsPaginate
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listRepoTagsPaginate The new operation
     */
    public function listRepoTagsPaginate($Authorization, $pageURL);

    /**
     * listRepoTags
     *
     * List tags for a repository. Response can be paged. This can be used either as a
     * authed request (for private repos and higher rate limiting), or as unsigned,
     * (public only, lower limit).
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoTags The new operation
     */
    public function listRepoTags($Authorization, $owner, $repo);

    /**
     * listRepoBranches
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoBranches The new operation
     */
    public function listRepoBranches($Authorization, $owner, $repo);

    /**
     * getRepoBranch
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @param mixed $branch 
     * @return \GithubService\Operation\getRepoBranch The new operation
     */
    public function getRepoBranch($Authorization, $owner, $repo, $branch);

    /**
     * deleteRepo
     *
     * @param string $Authorization The stupid oauth2 bearer token
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\deleteRepo The new operation
     */
    public function deleteRepo($Authorization, $owner, $repo);

    /**
     * executeAsync
     *
     * Execute an operation asynchronously.
     *
     * @param \ArtaxServiceBuilder\Operation $operation The operation to perform
     * @param callable $callback The callback to call on completion/response.
     * Parameters should be blah blah blah
     * @return \After\Promise A promise to resolve the call at some time.
     */
    public function executeAsync(\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation, callable $callback);


}
