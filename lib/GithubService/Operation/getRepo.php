<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\Operation;

class getRepo implements \ArtaxServiceBuilder\Operation
{

    /**
     * @var $api \GithubService\GithubArtaxService\GithubArtaxService
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

    public function __construct(\GithubService\GithubArtaxService\GithubArtaxService $api, $Authorization, $userAgent, $username, $type, $sort, $direction)
    {
        $defaultParams = [
            'Accept' => 'application/vnd.github.v3+json',
        ];
        $this->setParams($defaultParams);
        $this->api = $api;
        $this->parameters['Authorization'] = $Authorization;
        $this->parameters['userAgent'] = $userAgent;
        $this->parameters['username'] = $username;
        $this->parameters['type'] = $type;
        $this->parameters['sort'] = $sort;
        $this->parameters['direction'] = $direction;
    }

    public function setAPI(\GithubService\GithubArtaxService\GithubArtaxService $api)
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
        if (array_key_exists('type', $params)) {
             $this->parameters['type'] = $params['type'];
        }
        if (array_key_exists('sort', $params)) {
             $this->parameters['sort'] = $params['sort'];
        }
        if (array_key_exists('direction', $params)) {
             $this->parameters['direction'] = $params['direction'];
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

    public function setType($type)
    {
        $this->parameters['type'] = $type;
    }

    public function setSort($sort)
    {
        $this->parameters['sort'] = $sort;
    }

    public function setDirection($direction)
    {
        $this->parameters['direction'] = $direction;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return mixed
     * @param string $name The name of the parameter to get.
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
        $value = $this->getFilteredParameter('username');
        $queryParameters['username'] = $value;
        $value = $this->getFilteredParameter('type');
        $queryParameters['type'] = $value;
        $value = $this->getFilteredParameter('sort');
        $queryParameters['sort'] = $value;
        $value = $this->getFilteredParameter('direction');
        $queryParameters['direction'] = $value;

        //Parameters are parsed and set, lets prepare the request
        if ($url == null) {
            $url = "https://api.github.com/repos/:owner/:repo";
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
     * Create and call the operation, returning the raw response from the server.
     *
     * @return \Artax\Response
     */
    public function createAndCall()
    {
        $request = $this->createRequest();
        $response = $this->api->execute($request);
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
        $response = $this->api->execute($request);
        $this->response = $response;
        return $response->getBody();
    }

    public function executeAsync(callable $callable)
    {
        $request = $this->createRequest();
        return $this->api->executeAsync($request, $this, $callable);
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return mixed
     * @param \Artax\Request $request The request to be processed
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->execute($request);
        $this->response = $response;
        return $response->getBody();
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return mixed
     * @param \Artax\Response $response The HTTP response.
     */
    public function processResponse(\Artax\Response $response)
    {
        return $response->getBody();
    }


}
