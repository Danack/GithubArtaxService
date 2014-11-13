<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\GithubArtaxService;

use Amp\Artax\Request;
use Amp\Artax\Response;
use GithubService\Operation\getOauthAuthorization;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\ProcessResponseException;
use GithubService\Operation\getAuthorizations;
use GithubService\Operation\listAuthorizations;
use GithubService\Operation\basicListAuthorizations;
use GithubService\Operation\createAuthToken;
use GithubService\Operation\revokeAllAuthority;
use GithubService\Operation\listRepositories;
use GithubService\Operation\listUserRepositories;
use GithubService\Operation\listOrganizationRepositories;
use GithubService\Operation\listAllPublicRepositories;
use GithubService\Operation\getRepo;
use GithubService\Operation\getUserInfoByName;
use GithubService\Operation\listRepoLanguages;
use GithubService\Operation\listRepoTeams;
use GithubService\Operation\listRepoTags;
use GithubService\Operation\listRepoBranches;
use GithubService\Operation\getRepoBranch;
use GithubService\Operation\deleteRepo;
use GithubService\Operation\listRepoCommits;
use GithubService\Operation\getSingleCommit;
use GithubService\Operation\updateFile;
use GithubService\Operation\getUserInfo;
use GithubService\Operation\getUserEmails;
use GithubService\Operation\addUserEmails;
use GithubService\Operation\getAuthorizationsPaginate;
use GithubService\Operation\listAuthorizationsPaginate;
use GithubService\Operation\basicListAuthorizationsPaginate;
use GithubService\Operation\getUserInfoByNamePaginate;
use GithubService\Operation\listRepoTagsPaginate;
use GithubService\Operation\listRepoBranchesPaginate;
use GithubService\Operation\getRepoBranchPaginate;
use GithubService\Operation\listRepoCommitsPaginate;
use GithubService\Operation\getSingleCommitPaginate;
use GithubService\Operation\getUserInfoPaginate;
use GithubService\Operation\getUserEmailsPaginate;
use ArtaxServiceBuilder\ResponseCache;

class GithubArtaxService implements \GithubService\GithubService {

    /**
     * @var  $userAgent
     */
    public $userAgent = null;

    /**
     * @var \ArtaxServiceBuilder\ResponseCache $responseCache
     */
    public $responseCache = null;

    public function __construct(\Amp\Artax\Client $client, \ArtaxServiceBuilder\ResponseCache $responseCache, $userAgent) {
        $this->client = $client;
        $this->responseCache = $responseCache;
        $this->userAgent = $userAgent;
    }

    /**
     * getOauthAuthorization
     *
     * Retrieve the Outh2 token for an application. You should have directed the user
     * to https://github.com/login/oauth/authorize with client_id etc set before
     * calling this.
     *
     * @param mixed $client_id string Required. The client ID you received from GitHub
     * when you registered.
     * @param mixed $client_secret string Required. The client secret you received from
     * GitHub when you registered.
     * @param mixed $code string Required. The code you received as a response to Step
     * 1.
     * @param mixed $redirect_uri string The URL in your app where users will be sent
     * after authorization. See details below about redirect urls.
     * @return \GithubService\Operation\getOauthAuthorization The new operation
     */
    public function getOauthAuthorization($client_id, $client_secret, $code, $redirect_uri) {
        $instance = new getOauthAuthorization($this, $this->getUserAgent(), $client_id, $client_secret, $code, $redirect_uri);
        return $instance;
    }

    /**
     * getAuthorizations
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\getAuthorizations The new operation
     */
    public function getAuthorizations($Authorization) {
        $instance = new getAuthorizations($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listAuthorizations
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listAuthorizations The new operation
     */
    public function listAuthorizations($Authorization) {
        $instance = new listAuthorizations($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * basicListAuthorizations
     *
     * @param mixed $Authorization The basic auth.
     * @return \GithubService\Operation\basicListAuthorizations The new operation
     */
    public function basicListAuthorizations($Authorization) {
        $instance = new basicListAuthorizations($this, $this->getUserAgent(), $Authorization);
        return $instance;
    }

    /**
     * createAuthToken
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $scopes 
     * @param mixed $note 
     * @param mixed $note_url 
     * @return \GithubService\Operation\createAuthToken The new operation
     */
    public function createAuthToken($Authorization, $scopes, $note, $note_url) {
        $instance = new createAuthToken($this, $Authorization, $this->getUserAgent(), $scopes, $note, $note_url);
        return $instance;
    }

    /**
     * revokeAllAuthority
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $client_id The id of the client.
     * @return \GithubService\Operation\revokeAllAuthority The new operation
     */
    public function revokeAllAuthority($Authorization, $client_id) {
        $instance = new revokeAllAuthority($this, $Authorization, $this->getUserAgent(), $client_id);
        return $instance;
    }

    /**
     * listRepositories
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $type Can be one of all, owner, public, private, member. Default:
     * all
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc; otherwise desc
     * @return \GithubService\Operation\listRepositories The new operation
     */
    public function listRepositories($Authorization, $type, $sort, $direction) {
        $instance = new listRepositories($this, $Authorization, $this->getUserAgent(), $type, $sort, $direction);
        return $instance;
    }

    /**
     * listUserRepositories
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $username The user to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc, otherwise desc
     * @return \GithubService\Operation\listUserRepositories The new operation
     */
    public function listUserRepositories($Authorization, $username, $type, $sort, $direction) {
        $instance = new listUserRepositories($this, $Authorization, $this->getUserAgent(), $username, $type, $sort, $direction);
        return $instance;
    }

    /**
     * listOrganizationRepositories
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $organisation The organisation to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @return \GithubService\Operation\listOrganizationRepositories The new operation
     */
    public function listOrganizationRepositories($Authorization, $organisation, $type) {
        $instance = new listOrganizationRepositories($this, $Authorization, $this->getUserAgent(), $organisation, $type);
        return $instance;
    }

    /**
     * listAllPublicRepositories
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $since The integer ID of the last Repository that you’ve seen.
     * @return \GithubService\Operation\listAllPublicRepositories The new operation
     */
    public function listAllPublicRepositories($Authorization, $since) {
        $instance = new listAllPublicRepositories($this, $Authorization, $this->getUserAgent(), $since);
        return $instance;
    }

    /**
     * getRepo
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $username The user to fetch the repos for.
     * @param string $type Can be one of all, owner, member. Default: owner
     * @param string $sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param string $direction Can be one of asc or desc. Default: when using
     * full_name: asc, otherwise desc
     * @return \GithubService\Operation\getRepo The new operation
     */
    public function getRepo($Authorization, $username, $type, $sort, $direction) {
        $instance = new getRepo($this, $Authorization, $this->getUserAgent(), $username, $type, $sort, $direction);
        return $instance;
    }

    /**
     * getUserInfoByName
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $username The username of the client.
     * @return \GithubService\Operation\getUserInfoByName The new operation
     */
    public function getUserInfoByName($Authorization, $username) {
        $instance = new getUserInfoByName($this, $Authorization, $this->getUserAgent(), $username);
        return $instance;
    }

    /**
     * listRepoLanguages
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $owner The owner of the repo to fetch contributors for.
     * @param string $repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoLanguages The new operation
     */
    public function listRepoLanguages($Authorization, $owner, $repo) {
        $instance = new listRepoLanguages($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoTeams
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $owner The owner of the repo to fetch contributors for.
     * @param string $repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoTeams The new operation
     */
    public function listRepoTeams($Authorization, $owner, $repo) {
        $instance = new listRepoTeams($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoTags
     *
     * List tags for a repository. Response can be paged. This can be used either as a
     * authed request (for private repos and higher rate limiting), or as unsigned,
     * (public only, lower limit).
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoTags The new operation
     */
    public function listRepoTags($Authorization, $owner, $repo) {
        $instance = new listRepoTags($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoBranches
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoBranches The new operation
     */
    public function listRepoBranches($Authorization, $owner, $repo) {
        $instance = new listRepoBranches($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * getRepoBranch
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @param mixed $branch 
     * @return \GithubService\Operation\getRepoBranch The new operation
     */
    public function getRepoBranch($Authorization, $owner, $repo, $branch) {
        $instance = new getRepoBranch($this, $Authorization, $this->getUserAgent(), $owner, $repo, $branch);
        return $instance;
    }

    /**
     * deleteRepo
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\deleteRepo The new operation
     */
    public function deleteRepo($Authorization, $owner, $repo) {
        $instance = new deleteRepo($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoCommits
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @return \GithubService\Operation\listRepoCommits The new operation
     */
    public function listRepoCommits($Authorization, $owner, $repo) {
        $instance = new listRepoCommits($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * getSingleCommit
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $owner 
     * @param mixed $repo 
     * @param string $sha SHA of the commit to get
     * @return \GithubService\Operation\getSingleCommit The new operation
     */
    public function getSingleCommit($Authorization, $owner, $repo, $sha) {
        $instance = new getSingleCommit($this, $Authorization, $this->getUserAgent(), $owner, $repo, $sha);
        return $instance;
    }

    /**
     * updateFile
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $path The content path.
     * @param mixed $owner 
     * @param string $repo 
     * @param string $content The updated file content, Base64 encoded.
     * @param string $sha The blob SHA of the file being replaced.
     * @param string $branch The branch name. Default: the repository’s default
     * branch (usually master)
     * @param string $message The commit message.
     * @return \GithubService\Operation\updateFile The new operation
     */
    public function updateFile($Authorization, $path, $owner, $repo, $content, $sha, $branch, $message) {
        $instance = new updateFile($this, $Authorization, $this->getUserAgent(), $path, $owner, $repo, $content, $sha, $branch, $message);
        return $instance;
    }

    /**
     * getUserInfo
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\getUserInfo The new operation
     */
    public function getUserInfo($Authorization) {
        $instance = new getUserInfo($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * getUserEmails
     *
     * Get users email addresses
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\getUserEmails The new operation
     */
    public function getUserEmails($Authorization) {
        $instance = new getUserEmails($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * addUserEmails
     *
     * Get users email addresses
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $emails Array of the emails to add
     * @return \GithubService\Operation\addUserEmails The new operation
     */
    public function addUserEmails($Authorization, $emails) {
        $instance = new addUserEmails($this, $Authorization, $this->getUserAgent(), $emails);
        return $instance;
    }

    /**
     * getAuthorizationsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getAuthorizationsPaginate The new operation
     */
    public function getAuthorizationsPaginate($Authorization, $pageURL) {
        $instance = new getAuthorizationsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listAuthorizationsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listAuthorizationsPaginate The new operation
     */
    public function listAuthorizationsPaginate($Authorization, $pageURL) {
        $instance = new listAuthorizationsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * basicListAuthorizationsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\basicListAuthorizationsPaginate The new
     * operation
     */
    public function basicListAuthorizationsPaginate($Authorization, $pageURL) {
        $instance = new basicListAuthorizationsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getUserInfoByNamePaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getUserInfoByNamePaginate The new operation
     */
    public function getUserInfoByNamePaginate($Authorization, $pageURL) {
        $instance = new getUserInfoByNamePaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listRepoTagsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listRepoTagsPaginate The new operation
     */
    public function listRepoTagsPaginate($Authorization, $pageURL) {
        $instance = new listRepoTagsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listRepoBranchesPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listRepoBranchesPaginate The new operation
     */
    public function listRepoBranchesPaginate($Authorization, $pageURL) {
        $instance = new listRepoBranchesPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getRepoBranchPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getRepoBranchPaginate The new operation
     */
    public function getRepoBranchPaginate($Authorization, $pageURL) {
        $instance = new getRepoBranchPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listRepoCommitsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listRepoCommitsPaginate The new operation
     */
    public function listRepoCommitsPaginate($Authorization, $pageURL) {
        $instance = new listRepoCommitsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getSingleCommitPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getSingleCommitPaginate The new operation
     */
    public function getSingleCommitPaginate($Authorization, $pageURL) {
        $instance = new getSingleCommitPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getUserInfoPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getUserInfoPaginate The new operation
     */
    public function getUserInfoPaginate($Authorization, $pageURL) {
        $instance = new getUserInfoPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getUserEmailsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getUserEmailsPaginate The new operation
     */
    public function getUserEmailsPaginate($Authorization, $pageURL) {
        $instance = new getUserEmailsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * @return
     */
    public function getUserAgent() {
        return $this->userAgent;
    }

    public function setUserAgent($value) {
        $this->userAgent = $value;
    }

    /**
     * execute
     *
     * Sends a request to the API synchronously
     *
     * @param $request \Amp\Artax\Request The request to send.
     * @param $operation \ArtaxServiceBuilder\Operation The response that is called the
     * execute.
     * @return \Amp\Artax\Response The response from Artax
     */
    public function execute(\Amp\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation) {
        $originalRequest = clone $request;
        $cachingHeaders = $this->responseCache->getCachingHeaders($request);
        $request->setAllHeaders($cachingHeaders);
        $promise = $this->client->request($request);
        $response = $promise->wait();

        if ($response) {
            $operation->setResponse($response);
            $operation->setOriginalResponse($response);
        }

        if ($operation->shouldResponseBeCached($response)) {
            $this->responseCache->storeResponse($originalRequest, $response);
        }

        if ($operation->shouldUseCachedResponse($response)) {
            $cachedResponse = $this->responseCache->getResponse($originalRequest);
            if ($cachedResponse) {
                $response = $cachedResponse;
                $operation->setResponse($response);
            }
            //@TODO This code should only be reached if the cache entry was deleted
            //so throw an exception? Or just leave the 304 to error?
        }

        $exception = $operation->translateResponseToException($response);

        if ($exception) {
            throw $exception;
        }

        return $response;
    }

    /**
     * executeAsync
     *
     * Execute an operation asynchronously.
     *
     * @param \ArtaxServiceBuilder\Operation $operation The operation to perform
     * @param callable $callback The callback to call on completion/response. The
     * signature of the method should be:
     * function(
     *     \Exception $error = null, // null if no error 
     *     $parsedData = null, //The parsed operation data i.e. same type as
     * responseClass of the operation.
     *     \Amp\Artax\Response $response = null //The response received or null if the
     * request completely failed.
     * )
     * @return \Amp\Promise A promise to resolve the call at some time.
     */
    public function executeAsync(\Amp\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation, callable $callback) {
        $originalRequest = clone $request;
        $cachingHeaders = $this->responseCache->getCachingHeaders($request);
        $request->setAllHeaders($cachingHeaders);
        $promise = $this->client->request($request);
        $promise->when(function(\Exception $error = null, Response $response = null) use ($originalRequest, $callback, $operation) {

            if ($response) {
                $operation->setResponse($response);
                $operation->setOriginalResponse($response);
            }

            if($error) {
                $callback($error, null, null);
                return;
            }

            if ($operation->shouldResponseBeCached($response)) {
                $this->responseCache->storeResponse($originalRequest, $response);
            }

            if ($operation->shouldUseCachedResponse($response)) {
                $cachedResponse = $this->responseCache->getResponse($originalRequest);
                if ($cachedResponse) {
                    $response = $cachedResponse;
                    $operation->setResponse($response);
                }
            }

            $responseException = $operation->translateResponseToException($response);
            if ($responseException) {
                $callback($responseException, null, $response);
                return;
            }

            if ($operation->shouldResponseBeProcessed($response)) {
                try {
                    $parsedResponse = $operation->processResponse($response);
                    $callback(null, $parsedResponse, $response);
                }
                catch(\Exception $e) {
                    $exception = new ProcessResponseException("Exception parsing response: ".$e->getMessage(), 0, $e);
                    $callback($exception, null, $response);
                }
            }
            else {
                $callback(null, null, $response);
            }
        });

        return $promise;
    }

    /**
     * Determine whether the response should be processed.
     *
     * @return boolean
     */
    public function shouldResponseBeProcessed(\Amp\Artax\Response $response) {
        return true;
    }

    /**
     * Determine whether the response should be cached.
     *
     * @return boolean
     */
    public function shouldResponseBeCached(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status == 200) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the cached response should be used.
     *
     * @return boolean
     */
    public function shouldUseCachedResponse(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status == 304) {
            return true;
        }

        return false;
    }

    /**
     * Inspect the response and return an exception if it is an error response.
     *      * Exceptions should extend \ArtaxServiceBuilder\BadResponseException
     *
     * @return BadResponseException
     */
    public function translateResponseToException(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status < 200 || $status >= 300) {
            return new BadResponseException(
                "Status $status is not treated as OK.",
                $response
            );
        }

        return null;
    }


}
