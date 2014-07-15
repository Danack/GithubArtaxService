<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised if any changes to this file are over-written.
//
namespace GithubService\GithubAPI;

class getUserInfoByName implements \ArtaxServiceBuilder\Operation
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

    public function __construct(\GithubService\GithubAPI\GithubAPI $api, $Authorization, $userAgent, $username)
    {
        $defaultParams = [
            'Accept' => 'application/json',
        ];
        $this->setParams($defaultParams);
        $this->api = $api;
        $this->parameters['Authorization'] = $Authorization;
        $this->parameters['userAgent'] = $userAgent;
        $this->parameters['username'] = $username;
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
        if (array_key_exists('username', $params)) {
             $this->parameters['username'] = $params['username'];
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

    public function setUsername($username)
    {
        $this->parameters['username'] = $username;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return \GithubService\Model\User
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
        $url = "https://api.github.com/users/{username}";
        $request->setMethod('GET');
        $queryParameters = [];


        $uriTemplate = new \ArtaxServiceBuilder\Service\UriTemplate\UriTemplate();
        $url = $uriTemplate->expand($url, $this->parameters);
        $request->setHeader('Accept', $this->getFilteredParameter('Accept'));
        $request->setHeader('Authorization', $this->getFilteredParameter('Authorization'));
        $request->setHeader('User-Agent', $this->getFilteredParameter('userAgent'));
        $queryParameters['username'] = $this->getFilteredParameter('username');

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
     * @return \GithubService\Model\User
     */
    public function execute()
    {
        $request = $this->createRequest();
        $response = $this->api->callAPI($request);
        $this->response = $response;
        $instance = \GithubService\Model\User::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\User
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->callAPI($request);
        $this->response = $response;
        $instance = \GithubService\Model\User::createFromResponse($response, $this);

        return $instance;
    }


}
