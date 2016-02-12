<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\GithubArtaxService;

use Amp\Artax\Request;
use Amp\Artax\Response;
use Amp\Reactor;
use GithubService\Operation\getOauthAuthorization;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\ProcessResponseException;
use GithubService\Operation\listEmojis;
use GithubService\Operation\listUsersGists;
use GithubService\Operation\listSelfGists;
use GithubService\Operation\listPublicGists;
use GithubService\Operation\listSelfStarredGists;
use GithubService\Operation\getGist;
use GithubService\Operation\getGistByRevision;
use GithubService\Operation\createGist;
use GithubService\Operation\updateGist;
use GithubService\Operation\listGistCommits;
use GithubService\Operation\starGist;
use GithubService\Operation\unstarGist;
use GithubService\Operation\checkGistStarred;
use GithubService\Operation\forkGist;
use GithubService\Operation\listGistForks;
use GithubService\Operation\deleteGist;
use GithubService\Operation\listEmojisPaginate;
use GithubService\Operation\listUsersGistsPaginate;
use GithubService\Operation\listSelfGistsPaginate;
use GithubService\Operation\listPublicGistsPaginate;
use GithubService\Operation\listSelfStarredGistsPaginate;
use GithubService\Operation\getGistPaginate;
use GithubService\Operation\getGistByRevisionPaginate;
use GithubService\Operation\listGistCommitsPaginate;
use GithubService\Operation\listGistForksPaginate;
use ArtaxServiceBuilder\ResponseCache;

class GithubArtaxService implements \GithubService\GithubService {

    /**
     * @var \ $userAgent
     */
    public $userAgent = null;

    /**
     * @var \ArtaxServiceBuilder\ResponseCache $responseCache
     */
    public $responseCache = null;

    /**
     * @var \Amp\Reactor $reactor
     */
    public $reactor = null;

    public function __construct(\Amp\Artax\Client $client, \Amp\Reactor $reactor, \ArtaxServiceBuilder\ResponseCache $responseCache, $userAgent) {
        $this->client = $client;
        $this->reactor = $reactor;
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
     * listEmojis
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listEmojis The new operation
     */
    public function listEmojis($Authorization) {
        $instance = new listEmojis($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listUsersGists
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param string $username 
     * @return \GithubService\Operation\listUsersGists The new operation
     */
    public function listUsersGists($Authorization, $username) {
        $instance = new listUsersGists($this, $Authorization, $this->getUserAgent(), $username);
        return $instance;
    }

    /**
     * listSelfGists
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listSelfGists The new operation
     */
    public function listSelfGists($Authorization) {
        $instance = new listSelfGists($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listPublicGists
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listPublicGists The new operation
     */
    public function listPublicGists($Authorization) {
        $instance = new listPublicGists($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listSelfStarredGists
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listSelfStarredGists The new operation
     */
    public function listSelfStarredGists($Authorization) {
        $instance = new listSelfStarredGists($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * getGist
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\getGist The new operation
     */
    public function getGist($Authorization) {
        $instance = new getGist($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * getGistByRevision
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\getGistByRevision The new operation
     */
    public function getGistByRevision($Authorization) {
        $instance = new getGistByRevision($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * createGist
     *
     * @return \GithubService\Operation\createGist The new operation
     */
    public function createGist() {
        $instance = new createGist($this);
        return $instance;
    }

    /**
     * updateGist
     *
     * @return \GithubService\Operation\updateGist The new operation
     */
    public function updateGist() {
        $instance = new updateGist($this);
        return $instance;
    }

    /**
     * listGistCommits
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listGistCommits The new operation
     */
    public function listGistCommits($Authorization) {
        $instance = new listGistCommits($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * starGist
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\starGist The new operation
     */
    public function starGist($Authorization) {
        $instance = new starGist($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * unstarGist
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\unstarGist The new operation
     */
    public function unstarGist($Authorization) {
        $instance = new unstarGist($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * checkGistStarred
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\checkGistStarred The new operation
     */
    public function checkGistStarred($Authorization) {
        $instance = new checkGistStarred($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * forkGist
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\forkGist The new operation
     */
    public function forkGist($Authorization) {
        $instance = new forkGist($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listGistForks
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\listGistForks The new operation
     */
    public function listGistForks($Authorization) {
        $instance = new listGistForks($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * deleteGist
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @return \GithubService\Operation\deleteGist The new operation
     */
    public function deleteGist($Authorization) {
        $instance = new deleteGist($this, $Authorization, $this->getUserAgent());
        return $instance;
    }

    /**
     * listEmojisPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listEmojisPaginate The new operation
     */
    public function listEmojisPaginate($Authorization, $pageURL) {
        $instance = new listEmojisPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listUsersGistsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listUsersGistsPaginate The new operation
     */
    public function listUsersGistsPaginate($Authorization, $pageURL) {
        $instance = new listUsersGistsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listSelfGistsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listSelfGistsPaginate The new operation
     */
    public function listSelfGistsPaginate($Authorization, $pageURL) {
        $instance = new listSelfGistsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listPublicGistsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listPublicGistsPaginate The new operation
     */
    public function listPublicGistsPaginate($Authorization, $pageURL) {
        $instance = new listPublicGistsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listSelfStarredGistsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listSelfStarredGistsPaginate The new operation
     */
    public function listSelfStarredGistsPaginate($Authorization, $pageURL) {
        $instance = new listSelfStarredGistsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getGistPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getGistPaginate The new operation
     */
    public function getGistPaginate($Authorization, $pageURL) {
        $instance = new getGistPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * getGistByRevisionPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\getGistByRevisionPaginate The new operation
     */
    public function getGistByRevisionPaginate($Authorization, $pageURL) {
        $instance = new getGistByRevisionPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listGistCommitsPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listGistCommitsPaginate The new operation
     */
    public function listGistCommitsPaginate($Authorization, $pageURL) {
        $instance = new listGistCommitsPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
        return $instance;
    }

    /**
     * listGistForksPaginate
     *
     * @param string $Authorization The token to use for the request. This should
     * either be an a complete token in the format appropriate format e.g. 'token
     * 123567890' for an oauth token, or '"Basic
     * ".base64_encode($username.":".$password)"' for a Basic token or anything that
     * can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     * @param mixed $pageURL 
     * @return \GithubService\Operation\listGistForksPaginate The new operation
     */
    public function listGistForksPaginate($Authorization, $pageURL) {
        $instance = new listGistForksPaginate($this, $Authorization, $this->getUserAgent(), $pageURL);
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
        $response = \Amp\wait($promise, $this->reactor);

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
                    $exception = new ProcessResponseException("Exception parsing response: ".$e->getMessage(), $response, 0, $e);
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
     * Exceptions should extend \ArtaxServiceBuilder\BadResponseException
     *
     * @return BadResponseException
     */
    public function translateResponseToException(\Amp\Artax\Response $response) {
        return null;
    }
}
