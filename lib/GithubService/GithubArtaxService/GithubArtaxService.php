<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\GithubArtaxService;

use GithubService\Operation\getAuthorizations;
use Artax\Response;
use GithubService\Operation\accessToken;
use GithubService\Operation\revokeAllAuthority;
use GithubService\Operation\getUserEmails;
use GithubService\Operation\addUserEmails;
use GithubService\Operation\listUserRepos;
use GithubService\Operation\getUserInfoByName;
use GithubService\Operation\getUserInfo;
use GithubService\Operation\listRepoCommitsPaginate;
use GithubService\Operation\listRepoCommits;
use GithubService\Operation\getSingleCommit;
use GithubService\Operation\listRepositories;
use GithubService\Operation\listUserRepositories;
use GithubService\Operation\listOrganizationRepositories;
use GithubService\Operation\listAllPublicRepositories;
use GithubService\Operation\getRepo;
use GithubService\Operation\listRepoLanguages;
use GithubService\Operation\listRepoTeams;
use GithubService\Operation\listRepoTagsPaginate;
use GithubService\Operation\listRepoTags;
use GithubService\Operation\listRepoBranches;
use GithubService\Operation\getRepoBranch;
use GithubService\Operation\deleteRepo;

class GithubArtaxService implements \GithubService\GithubService
{

    /**
     * @var  $userAgent
     */
    public $userAgent = null;

    public function __construct(\Artax\Client $client, $userAgent)
    {
        $this->client = $client;
        $this->userAgent = $userAgent;
    }

    /**
     * getAuthorizations
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getAuthorizations The new operation
     */
    public function getAuthorizations($Authorization)
    {
        $instance = new getAuthorizations($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * accessToken
     *
     * @param  \$client_id string Required. The client ID you received from GitHub when
     * you registered.
     * @param  \$client_secret string Required. The client secret you received from
     * GitHub when you registered.
     * @param  \$code string Required. The code you received as a response to Step 1.
     * @param  \$redirect_uri string The URL in your app where users will be sent after
     * authorization. See details below about redirect urls.
     * @return \GithubService\Operation\accessToken The new operation
     */
    public function accessToken($client_id, $client_secret, $code, $redirect_uri)
    {
        $instance = new accessToken($this, $this->getUserAgent(), $client_id, $client_secret, $code, $redirect_uri);
        return $instance;
    }

    /**
     * revokeAllAuthority
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$client_id The id of the client.
     * @return \GithubService\Operation\revokeAllAuthority The new operation
     */
    public function revokeAllAuthority($Authorization, $client_id)
    {
        $instance = new revokeAllAuthority($this, $Authorization, $this->getUserAgent(), $client_id);
        return $instance;
    }

    /**
     * getUserEmails
     *
     * Get users email addresses
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getUserEmails The new operation
     */
    public function getUserEmails($Authorization)
    {
        $instance = new getUserEmails($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * addUserEmails
     *
     * Get users email addresses
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$emails Array of the emails to add
     * @return \GithubService\Operation\addUserEmails The new operation
     */
    public function addUserEmails($Authorization, $emails)
    {
        $instance = new addUserEmails($this, $Authorization, $this->getUserAgent(), $emails);
        return $instance;
    }

    /**
     * listUserRepos
     *
     * List repositories for the authenticated user. Note that this does not include
     * repositories owned by organizations which the user can access. You can list user
     * organizations and list organization repositories separately.
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\listUserRepos The new operation
     */
    public function listUserRepos($Authorization)
    {
        $instance = new listUserRepos($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * getUserInfoByName
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner The owner of the repo to fetch contributors for.
     * @param  \$repo The repo to fetch contributors for.
     * @param  \$anon Set to 1 or true to include anonymous contributors in results.
     * @return \GithubService\Operation\getUserInfoByName The new operation
     */
    public function getUserInfoByName($Authorization, $owner, $repo, $anon)
    {
        $instance = new getUserInfoByName($this, $Authorization, $this->getUserAgent(), $owner, $repo, $anon);
        return $instance;
    }

    /**
     * getUserInfo
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @return \GithubService\Operation\getUserInfo The new operation
     */
    public function getUserInfo($Authorization)
    {
        $instance = new getUserInfo($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listRepoCommitsPaginate
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$pageURL 
     * @return \GithubService\Operation\listRepoCommitsPaginate The new operation
     */
    public function listRepoCommitsPaginate($Authorization, $pageURL)
    {
        $instance = new listRepoCommitsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listRepoCommits
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @return \GithubService\Operation\listRepoCommits The new operation
     */
    public function listRepoCommits($Authorization, $owner, $repo)
    {
        $instance = new listRepoCommits($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * getSingleCommit
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @param  \$sha SHA of the commit to get
     * @return \GithubService\Operation\getSingleCommit The new operation
     */
    public function getSingleCommit($Authorization, $owner, $repo, $sha)
    {
        $instance = new getSingleCommit($this, $Authorization, $this->getUserAgent(), $owner, $repo, $sha);
        return $instance;
    }

    /**
     * listRepositories
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$type Can be one of all, owner, public, private, member. Default: all
     * @param  \$sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param  \$direction Can be one of asc or desc. Default: when using full_name:
     * asc; otherwise desc
     * @return \GithubService\Operation\listRepositories The new operation
     */
    public function listRepositories($Authorization, $type, $sort, $direction)
    {
        $instance = new listRepositories($this, $Authorization, $this->getUserAgent(), $type, $sort, $direction);
        return $instance;
    }

    /**
     * listUserRepositories
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$username The user to fetch the repos for.
     * @param  \$type Can be one of all, owner, member. Default: owner
     * @param  \$sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param  \$direction Can be one of asc or desc. Default: when using full_name:
     * asc, otherwise desc
     * @return \GithubService\Operation\listUserRepositories The new operation
     */
    public function listUserRepositories($Authorization, $username, $type, $sort, $direction)
    {
        $instance = new listUserRepositories($this, $Authorization, $this->getUserAgent(), $username, $type, $sort, $direction);
        return $instance;
    }

    /**
     * listOrganizationRepositories
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$organisation The organisation to fetch the repos for.
     * @param  \$type Can be one of all, owner, member. Default: owner
     * @return \GithubService\Operation\listOrganizationRepositories The new operation
     */
    public function listOrganizationRepositories($Authorization, $organisation, $type)
    {
        $instance = new listOrganizationRepositories($this, $Authorization, $this->getUserAgent(), $organisation, $type);
        return $instance;
    }

    /**
     * listAllPublicRepositories
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$since The integer ID of the last Repository that you’ve seen.
     * @return \GithubService\Operation\listAllPublicRepositories The new operation
     */
    public function listAllPublicRepositories($Authorization, $since)
    {
        $instance = new listAllPublicRepositories($this, $Authorization, $this->getUserAgent(), $since);
        return $instance;
    }

    /**
     * getRepo
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$username The user to fetch the repos for.
     * @param  \$type Can be one of all, owner, member. Default: owner
     * @param  \$sort Can be one of created, updated, pushed, full_name. Default:
     * full_name
     * @param  \$direction Can be one of asc or desc. Default: when using full_name:
     * asc, otherwise desc
     * @return \GithubService\Operation\getRepo The new operation
     */
    public function getRepo($Authorization, $username, $type, $sort, $direction)
    {
        $instance = new getRepo($this, $Authorization, $this->getUserAgent(), $username, $type, $sort, $direction);
        return $instance;
    }

    /**
     * listRepoLanguages
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner The owner of the repo to fetch contributors for.
     * @param  \$repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoLanguages The new operation
     */
    public function listRepoLanguages($Authorization, $owner, $repo)
    {
        $instance = new listRepoLanguages($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoTeams
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner The owner of the repo to fetch contributors for.
     * @param  \$repo The repo to fetch contributors for.
     * @return \GithubService\Operation\listRepoTeams The new operation
     */
    public function listRepoTeams($Authorization, $owner, $repo)
    {
        $instance = new listRepoTeams($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoTagsPaginate
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$pageURL 
     * @return \GithubService\Operation\listRepoTagsPaginate The new operation
     */
    public function listRepoTagsPaginate($Authorization, $pageURL)
    {
        $instance = new listRepoTagsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listRepoTags
     *
     * List tags for a repository. Response can be paged. This can be used either as a
     * authed request (for private repos and higher rate limiting), or as unsigned,
     * (public only, lower limit).
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @return \GithubService\Operation\listRepoTags The new operation
     */
    public function listRepoTags($Authorization, $owner, $repo)
    {
        $instance = new listRepoTags($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * listRepoBranches
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @return \GithubService\Operation\listRepoBranches The new operation
     */
    public function listRepoBranches($Authorization, $owner, $repo)
    {
        $instance = new listRepoBranches($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * getRepoBranch
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @param  \$branch 
     * @return \GithubService\Operation\getRepoBranch The new operation
     */
    public function getRepoBranch($Authorization, $owner, $repo, $branch)
    {
        $instance = new getRepoBranch($this, $Authorization, $this->getUserAgent(), $owner, $repo, $branch);
        return $instance;
    }

    /**
     * deleteRepo
     *
     * @param  \$Authorization The stupid oauth2 bearer token
     * @param  \$owner 
     * @param  \$repo 
     * @return \GithubService\Operation\deleteRepo The new operation
     */
    public function deleteRepo($Authorization, $owner, $repo)
    {
        $instance = new deleteRepo($this, $Authorization, $this->getUserAgent(), $owner, $repo);
        return $instance;
    }

    /**
     * @return
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function setUserAgent($value)
    {
        $this->userAgent = $value;
    }

    /**
     * execute
     *
     * Sends a request to the API synchronously
     *
     * @param $request \Artax\Request The request to send.
     * @param $successStatuses array A list of acceptable success statuses.
     * @return \Artax\Response  The response from Artax
     */
    public function execute(\Artax\Request $request, array $successStatuses = array())
    {
        $promise = $this->client->request($request);
        $response = $promise->wait();
        /** @var $response \Artax\Response */
        $status = $response->getStatus();
        $status = intval($status);

        if ($successStatuses != null  && in_array($status, $successStatuses)) {
            throw new \GithubService\GithubArtaxService\GithubArtaxServiceException(
                $response, 
                "Status does not match one of ".implode(', ', $successStatuses)
            );
        }
        else {
            if ($status < 200 || $status >= 300) {
                throw new \GithubService\GithubArtaxService\GithubArtaxServiceException(
                    $response, 
                    "Status $status is not 20x success."
                );
            }
        }

        return $response;
    }

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
    public function executeAsync(\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation, callable $callback)
    {
        $promise = $this->client->request($request);
        $promise->when(function($error, Response $response) use ($callback, $operation) {

            if($error) {
                $callback($error, $response);
                return;
            }

            $status = $response->getStatus();
            if ($status < 200 || $status >= 300) {
                $exception = new \Exception("Status $status is not treated as OK.");
                $callback($exception, $response);
                return;
            }

            try {
                $parsedResponse = $operation->processResponse($response);
                $callback(null, $parsedResponse);
            }
            catch(\Exception $e) {
                $exception = new \Exception("Exception parsing response: ".$e->getMessage(), 0, $e);
                $callback($exception, "Error parsing response", null);
            }
        });

        return $promise;
    }


}
