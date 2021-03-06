<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\Operation;

class listRepoCommits implements \ArtaxServiceBuilder\Operation {

    /**
     * @var \GithubService\GithubArtaxService\GithubArtaxService
     */
    public $api = null;

    /**
     * @var array
     */
    public $parameters = null;

    /**
     * @var \Amp\Artax\Response
     */
    public $response = null;

    /**
     * @var \Amp\Artax\Response
     */
    public $originalResponse = null;

    /**
     * Get the last response.
     *
     * @return \Amp\Artax\Response
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Set the last response. This should only be used by the API class when the
     * operation has been dispatched. Storing the response is required as some APIs
     * store out-of-bound information in the headers e.g. rate-limit info, pagination
     * that is not really part of the operation.
     */
    public function setResponse(\Amp\Artax\Response $response) {
        $this->response = $response;
    }

    public function __construct(\GithubService\GithubArtaxService\GithubArtaxService $api, \GithubService\AuthToken $authorization, $userAgent, $owner, $repo) {
        $defaultParams = [
            'Accept' => 'application/vnd.github.v3+json',
        ];
        $this->setParams($defaultParams);
        $this->api = $api;
        $this->parameters['Authorization'] = $authorization;
        $this->parameters['userAgent'] = $userAgent;
        $this->parameters['owner'] = $owner;
        $this->parameters['repo'] = $repo;
    }

    public function setAPI(\GithubService\GithubArtaxService\GithubArtaxService $api) {
        $this->api = $api;
    }

    public function setParams(array $params) {
        if (array_key_exists('Accept', $params)) {
            $this->parameters['Accept'] = $params['Accept'];
        }
        if (array_key_exists('Authorization', $params)) {
            $this->parameters['Authorization'] = $params['Authorization'];
        }
        if (array_key_exists('userAgent', $params)) {
            $this->parameters['userAgent'] = $params['userAgent'];
        }
        if (array_key_exists('perPage', $params)) {
            $this->parameters['perPage'] = $params['perPage'];
        }
        if (array_key_exists('otp', $params)) {
            $this->parameters['otp'] = $params['otp'];
        }
        if (array_key_exists('sha', $params)) {
            $this->parameters['sha'] = $params['sha'];
        }
        if (array_key_exists('path', $params)) {
            $this->parameters['path'] = $params['path'];
        }
        if (array_key_exists('author', $params)) {
            $this->parameters['author'] = $params['author'];
        }
        if (array_key_exists('since', $params)) {
            $this->parameters['since'] = $params['since'];
        }
        if (array_key_exists('until', $params)) {
            $this->parameters['until'] = $params['until'];
        }
        if (array_key_exists('owner', $params)) {
            $this->parameters['owner'] = $params['owner'];
        }
        if (array_key_exists('repo', $params)) {
            $this->parameters['repo'] = $params['repo'];
        }
    }

    /**
     * Set Accept
     *
     * @return $this
     */
    public function setAccept($Accept) {
        $this->parameters['Accept'] = $Accept;

        return $this;
    }

    /**
     * Set Authorization
     *
     * The token to use for the request. This should either be an a complete token in
     * the format appropriate format e.g. 'token 123567890' for an oauth token, or
     * '"Basic ".base64_encode($username.":".$password)"' for a Basic token or anything
     * that can be cast to a string in the correct format e.g. an 
     * \ArtaxServiceBuilder\BasicAuthToken object.
     *
     * @return $this
     */
    public function setAuthorization(\GithubService\AuthToken $Authorization) {
        $this->parameters['Authorization'] = $Authorization;

        return $this;
    }

    /**
     * Set userAgent
     *
     * The user-agent which allows Github to recognise your application.
     *
     * @return $this
     */
    public function setUserAgent($userAgent) {
        $this->parameters['userAgent'] = $userAgent;

        return $this;
    }

    /**
     * Set perPage
     *
     * The number of items to get per page.
     *
     * @return $this
     */
    public function setPerPage($perPage) {
        $this->parameters['perPage'] = $perPage;

        return $this;
    }

    /**
     * Set otp
     *
     * The one time password.
     *
     * @return $this
     */
    public function setOtp($otp) {
        $this->parameters['otp'] = $otp;

        return $this;
    }

    /**
     * Set sha
     *
     * SHA or branch to start listing commits from. Default: the repository’s default
     * branch (usually `master`).
     *
     * @return $this
     */
    public function setSha($sha) {
        $this->parameters['sha'] = $sha;

        return $this;
    }

    /**
     * Set path
     *
     * Only commits containing this file path will be returned.
     *
     * @return $this
     */
    public function setPath($path) {
        $this->parameters['path'] = $path;

        return $this;
    }

    /**
     * Set author
     *
     * GitHub login or email address by which to filter by commit author.
     *
     * @return $this
     */
    public function setAuthor($author) {
        $this->parameters['author'] = $author;

        return $this;
    }

    /**
     * Set since
     *
     * Only commits before this date will be returned. This is a timestamp in ISO 8601
     * format: `YYYY-MM-DDTHH:MM:SSZ`.
     *
     * @return $this
     */
    public function setSince($since) {
        $this->parameters['since'] = $since;

        return $this;
    }

    /**
     * Set until
     *
     * Only commits after this date will be returned. This is a timestamp in ISO 8601
     * format: `YYYY-MM-DDTHH:MM:SSZ`.
     *
     * @return $this
     */
    public function setUntil($until) {
        $this->parameters['until'] = $until;

        return $this;
    }

    /**
     * Set owner
     *
     * The owner of the repository
     *
     * @return $this
     */
    public function setOwner($owner) {
        $this->parameters['owner'] = $owner;

        return $this;
    }

    /**
     * Set repo
     *
     * The repository to get the commits for
     *
     * @return $this
     */
    public function setRepo($repo) {
        $this->parameters['repo'] = $repo;

        return $this;
    }

    public function getParameters() {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return \GithubService\Model\CommitList
     * @param string $name The name of the parameter to get.
     */
    public function getFilteredParameter($name) {
        if (array_key_exists($name, $this->parameters) == false) {
            throw new \Exception('Parameter '.$name.' does not exist.');
        }

        $value = $this->parameters[$name];

        switch ($name) {

            case ('Authorization'): {
                $args = [];
                $value = call_user_func_array([$value, 'getToken'], $args);
                break;
            }


            default:{}

        }

        return $value;
    }

    /**
     * Create an Amp\Artax\Request object from the operation.
     *
     * @return \Amp\Artax\Request
     */
    public function createRequest() {
        $request = new \Amp\Artax\Request();
        $url = null;
        $request->setMethod('GET');

        $queryParameters = [];

        if (array_key_exists('Accept', $this->parameters) == true) {
        $value = $this->getFilteredParameter('Accept');
            $request->setHeader('Accept', $value);
        }
        $value = $this->getFilteredParameter('Authorization');
        if ($value != null) {
            $request->setHeader('Authorization', $value);
        }
        $value = $this->getFilteredParameter('userAgent');
        $request->setHeader('User-Agent', $value);
        if (array_key_exists('perPage', $this->parameters) == true) {
        $value = $this->getFilteredParameter('perPage');
            $queryParameters['per_page'] = $value;
        }
        if (array_key_exists('otp', $this->parameters) == true) {
        $value = $this->getFilteredParameter('otp');
            $request->setHeader('X-GitHub-OTP', $value);
        }
        if (array_key_exists('sha', $this->parameters) == true) {
        $value = $this->getFilteredParameter('sha');
            $queryParameters['sha'] = $value;
        }
        if (array_key_exists('path', $this->parameters) == true) {
        $value = $this->getFilteredParameter('path');
            $queryParameters['path'] = $value;
        }
        if (array_key_exists('author', $this->parameters) == true) {
        $value = $this->getFilteredParameter('author');
            $queryParameters['author'] = $value;
        }
        if (array_key_exists('since', $this->parameters) == true) {
        $value = $this->getFilteredParameter('since');
            $queryParameters['since'] = $value;
        }
        if (array_key_exists('until', $this->parameters) == true) {
        $value = $this->getFilteredParameter('until');
            $queryParameters['until'] = $value;
        }
        $value = $this->getFilteredParameter('owner');
        $queryParameters['owner'] = $value;
        $value = $this->getFilteredParameter('repo');
        $queryParameters['repo'] = $value;

        //Parameters are parsed and set, lets prepare the request
        if ($url == null) {
            $url = "https://api.github.com/repos/{owner}/{repo}/commits";
        }
        $uriTemplate = new \ArtaxServiceBuilder\Service\UriTemplate\UriTemplate();
        $url = $uriTemplate->expand($url, $this->parameters);
        if (count($queryParameters)) {
            $url = $url.'?'.http_build_query($queryParameters, '', '&', PHP_QUERY_RFC3986);
        }
        $request->setUri($url);

        return $request;
    }

    /**
     * Create and execute the operation, returning the raw response from the server.
     *
     * @return \Amp\Artax\Response
     */
    public function createAndExecute() {
        $request = $this->createRequest();
        $response = $this->api->execute($request, $this);
        $this->response = $response;

        return $response;
    }

    /**
     * Create and execute the operation, then return the processed  response.
     *
     * @return mixed|\GithubService\Model\CommitList
     */
    public function call() {
        $request = $this->createRequest();
        $response = $this->api->execute($request, $this);
        $this->response = $response;

        if ($this->shouldResponseBeProcessed($response)) {
            $instance = $this->api->instantiateResult($response, $this);

            return $instance;
        }
        return $response;
    }

    /**
     * Execute the operation, returning the parsed response
     *
     * @return \GithubService\Model\CommitList
     */
    public function execute() {
        $request = $this->createRequest();
        return $this->dispatch($request);
    }

    /**
     * Execute the operation asynchronously, passing the parsed response to the
     * callback
     *
     * @return \Amp\Promise
     */
    public function executeAsync(callable $callable) {
        $request = $this->createRequest();
        return $this->dispatchAsync($request, $callable);
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\CommitList
     * @param \Amp\Artax\Request $request The request to be processed
     */
    public function dispatch(\Amp\Artax\Request $request) {
        $response = $this->api->execute($request, $this);
        $this->response = $response;
        $instance = $this->api->instantiateResult($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response asynchronously.
     * Allows you to modify the request before it is sent.
     *
     * @return \GithubService\Model\CommitList
     * @param \Amp\Artax\Request $request The request to be processed
     * @param callable $callable The callable that processes the response
     */
    public function dispatchAsync(\Amp\Artax\Request $request, callable $callable) {
        return $this->api->executeAsync($request, $this, $callable);
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\CommitList
     * @param \Amp\Artax\Response $response The HTTP response.
     */
    public function processResponse(\Amp\Artax\Response $response) {
        $instance = $this->api->instantiateResult($response, $this);

        return $instance;
    }

    /**
     * Determine whether the response should be processed. Override this method to have
     * a per-operation decision, otherwise the function is the API class will be used.
     *
     * @return \GithubService\Model\CommitList
     */
    public function shouldResponseBeProcessed(\Amp\Artax\Response $response) {
        return $this->api->shouldResponseBeProcessed($response);
    }

    /**
     * Determine whether the response is an error. Override this method to have a
     * per-operation decision, otherwise the function from the API class will be used.
     *
     * @return null|\ArtaxServiceBuilder\BadResponseException
     */
    public function translateResponseToException(\Amp\Artax\Response $response) {
        return $this->api->translateResponseToException($response);
    }

    /**
     * Determine whether the response indicates that we should use a cached response.
     * Override this method to have a per-operation decision, otherwise the
     * functionfrom the API class will be used.
     *
     * @return \GithubService\Model\CommitList
     */
    public function shouldUseCachedResponse(\Amp\Artax\Response $response) {
        return $this->api->shouldUseCachedResponse($response);
    }

    /**
     * Determine whether the response should be cached. Override this method to have a
     * per-operation decision, otherwise the function from the API class will be used.
     *
     * @return \GithubService\Model\CommitList
     */
    public function shouldResponseBeCached(\Amp\Artax\Response $response) {
        return $this->api->shouldResponseBeCached($response);
    }

    /**
     * Set the original response. This may be different from the cached response if one
     * is used.
     */
    public function setOriginalResponse(\Amp\Artax\Response $response) {
        $this->originalResponse = $response;
    }

    /**
     * Get the original response. This may be different from the cached response if one
     * is used.
     *
     * @return \Amp\Artax\Response
     */
    public function getOriginalResponse() {
        return $this->originalResponse;
    }

    /**
     * Return how the result of this operation should be instantiated.
     *
     * @return \Amp\Artax\Response
     */
    public function getResultInstantiationInfo() {
        return ['instantiate' => 'GithubService\\Model\\CommitList'];
    }


}
