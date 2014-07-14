<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised if any changes to this file are over-written.
//
namespace GithubService\GithubAPI;

class getSingleCommit implements \ArtaxServiceBuilder\Operation
{

    /**
     * @var $api \GithubService\GithubAPI\GithubAPI
     */
    public $api = null;

    /**
     * @var $api array
     */
    public $parameters = null;

    /**
     * @var $api \Artax\Response
     */
    public $response = null;

    /**
     * Get the last response.
     *
     * @return \Artax\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function __construct(\GithubService\GithubAPI\GithubAPI $api, $Authorization, $userAgent, $owner, $repo, $sha)
    {
        $defaultParams = [
            'Accept' => 'application/json',
        ];
        $this->setParams($defaultParams);
        $this->api = $api;
        $this->parameters['Authorization'] = $Authorization;
        $this->parameters['userAgent'] = $userAgent;
        $this->parameters['owner'] = $owner;
        $this->parameters['repo'] = $repo;
        $this->parameters['sha'] = $sha;
    }

    public function setAPI(\GithubService\GithubAPI\GithubAPI $api)
    {
        $this->api = $api;
    }

    public function setParams(array $params)
    {
        if (array_key_exists('Accept', $params)) {
             $this->parameters['Accept'] = $params['Accept'];
        }
        if (array_key_exists('Authorization', $params)) {
             $this->parameters['Authorization'] = $params['Authorization'];
        }
        if (array_key_exists('userAgent', $params)) {
             $this->parameters['userAgent'] = $params['userAgent'];
        }
        if (array_key_exists('owner', $params)) {
             $this->parameters['owner'] = $params['owner'];
        }
        if (array_key_exists('repo', $params)) {
             $this->parameters['repo'] = $params['repo'];
        }
        if (array_key_exists('sha', $params)) {
             $this->parameters['sha'] = $params['sha'];
        }
    }

    public function setAccept($Accept)
    {
        $this->parameters['Accept'] = $Accept;
    }

    public function setAuthorization($Authorization)
    {
        $this->parameters['Authorization'] = $Authorization;
    }

    public function setUserAgent($userAgent)
    {
        $this->parameters['userAgent'] = $userAgent;
    }

    public function setOwner($owner)
    {
        $this->parameters['owner'] = $owner;
    }

    public function setRepo($repo)
    {
        $this->parameters['repo'] = $repo;
    }

    public function setSha($sha)
    {
        $this->parameters['sha'] = $sha;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function createRequest()
    {
        $request = new \Artax\Request();
        $url = "https://api.github.com/repos/{owner}/{repo}/commits/{sha}";
        $request->setMethod('GET');
        $queryParameters = [];


        $uriTemplate = new \ArtaxServiceBuilder\Service\UriTemplate\UriTemplate();
        $url = $uriTemplate->expand($url, $this->parameters);
        $request->setHeader('Accept', $this->parameters['Accept']);
        $request->setHeader('Authorization', $this->parameters['Authorization']);
        $request->setHeader('User-Agent', $this->parameters['userAgent']);
        $queryParameters['owner'] = $this->parameters['owner'];
        $queryParameters['repo'] = $this->parameters['repo'];
        $queryParameters['sha'] = $this->parameters['sha'];

        //Parameters are parsed and set, lets prepare the request
        $request->setUri($url);

        return $request;
    }

    /**
     * Create and call the operation, returning the raw response from the server.
     *
     * @return \Artax\Response
     */
    public function createAndCall()
    {
        $request = $this->createRequest();
        $response = $this->api->callAPI($request);
        $this->response = $response;

        return $response;
    }

    /**
     * Execute the operation
     *
     * @return \GithubService\Model\Commit
     */
    public function execute()
    {
        $request = $this->createRequest();
        $response = $this->api->callAPI($request);
        $this->response = $response;
        $instance = \GithubService\Model\Commit::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\Commit
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->callAPI($request);
        $this->response = $response;
        $instance = \GithubService\Model\Commit::createFromResponse($response, $this);

        return $instance;
    }


}
