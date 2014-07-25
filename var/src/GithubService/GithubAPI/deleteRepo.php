<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised if any changes to this file are over-written.
//
namespace GithubService\GithubAPI;

class deleteRepo implements \ArtaxServiceBuilder\Operation
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

    public function __construct(\GithubService\GithubAPI\GithubAPI $api, $Authorization, $userAgent, $owner, $repo)
    {
        $defaultParams = [
            'Accept' => 'application/vnd.github.v3+json',
        ];
        $this->setParams($defaultParams);
        $this->api = $api;
        $this->parameters['Authorization'] = $Authorization;
        $this->parameters['userAgent'] = $userAgent;
        $this->parameters['owner'] = $owner;
        $this->parameters['repo'] = $repo;
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

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return mixed
     */
    public function getFilteredParameter($name)
    {
        if (array_key_exists($name, $this->parameters) == false) {
            throw new \Exception('Parameter '.$name.' does not exist.');
        }

        $value = $this->parameters[$name];

        switch ($name) {

            case ('Authorization'): {
                $args = [];
                $args[] = $value;
                $value = call_user_func_array('GithubService\Github::formatAuthToken', $args);
                break;
            }


            default:{}

        }

        return $value;
    }

    public function createRequest()
    {
        $request = new \Artax\Request();
        $url = "https://api.github.com/repos/{owner}/{repo}";
        $request->setMethod('DELETE');
        $queryParameters = [];


        $uriTemplate = new \ArtaxServiceBuilder\Service\UriTemplate\UriTemplate();
        $url = $uriTemplate->expand($url, $this->parameters);
        $request->setHeader('Accept', $this->getFilteredParameter('Accept'));
        $request->setHeader('Authorization', $this->getFilteredParameter('Authorization'));
        $request->setHeader('User-Agent', $this->getFilteredParameter('userAgent'));
        $queryParameters['owner'] = $this->getFilteredParameter('owner');
        $queryParameters['repo'] = $this->getFilteredParameter('repo');

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
     * @return mixed
     */
    public function execute()
    {
        $request = $this->createRequest();
        $response = $this->api->callAPI($request);
        $this->response = $response;
        return $response->getBody();
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return mixed
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->callAPI($request);
        $this->response = $response;
        return $response->getBody();
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return mixed
     */
    public function processResponse(\Artax\Response $response)
    {
        return $response->getBody();
    }


}
