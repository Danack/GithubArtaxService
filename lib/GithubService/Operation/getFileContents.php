<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\Operation;

class getFileContents implements \ArtaxServiceBuilder\Operation {

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

    public function __construct(\GithubService\GithubArtaxService\GithubArtaxService $api) {
        $this->api = $api;
    }

    public function setAPI(\GithubService\GithubArtaxService\GithubArtaxService $api) {
        $this->api = $api;
    }

    public function setParams(array $params) {
    }

    public function getParameters() {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return mixed
     * @param string $name The name of the parameter to get.
     */
    public function getFilteredParameter($name) {
        if (array_key_exists($name, $this->parameters) == false) {
            throw new \Exception('Parameter '.$name.' does not exist.');
        }

        $value = $this->parameters[$name];


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
        $request->setMethod('');



        //Parameters are parsed and set, lets prepare the request
        if ($url == null) {
            $url = "https://api.github.com";
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
     * @return mixed|\
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
     * @return mixed
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
     * @return mixed
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
     * @return mixed
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
     * @return mixed
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
     * @return mixed
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
     * @return mixed
     */
    public function shouldUseCachedResponse(\Amp\Artax\Response $response) {
        return $this->api->shouldUseCachedResponse($response);
    }

    /**
     * Determine whether the response should be cached. Override this method to have a
     * per-operation decision, otherwise the function from the API class will be used.
     *
     * @return mixed
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
        return null;
    }


}
