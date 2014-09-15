<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace GithubService\Operation;

class getRepoBranch implements \ArtaxServiceBuilder\Operation
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

    public function __construct(\GithubService\GithubArtaxService\GithubArtaxService $api, $Authorization, $userAgent, $owner, $repo, $branch)
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
        $this->parameters['branch'] = $branch;
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
        if (array_key_exists('perPage', $params)) {
             $this->parameters['perPage'] = $params['perPage'];
        }
        if (array_key_exists('owner', $params)) {
             $this->parameters['owner'] = $params['owner'];
        }
        if (array_key_exists('repo', $params)) {
             $this->parameters['repo'] = $params['repo'];
        }
        if (array_key_exists('branch', $params)) {
             $this->parameters['branch'] = $params['branch'];
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

    public function setPerPage($perPage)
    {
        $this->parameters['perPage'] = $perPage;
    }

    public function setOwner($owner)
    {
        $this->parameters['owner'] = $owner;
    }

    public function setRepo($repo)
    {
        $this->parameters['repo'] = $repo;
    }

    public function setBranch($branch)
    {
        $this->parameters['branch'] = $branch;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return \GithubService\Model\RepoBranch
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
        if (array_key_exists('perPage', $this->parameters) == true) {
        $value = $this->getFilteredParameter('perPage');
           $queryParameters['perPage'] = $value;
        }
        $value = $this->getFilteredParameter('owner');
        $queryParameters['owner'] = $value;
        $value = $this->getFilteredParameter('repo');
        $queryParameters['repo'] = $value;
        $value = $this->getFilteredParameter('branch');
        $queryParameters['branch'] = $value;

        //Parameters are parsed and set, lets prepare the request
        if ($url == null) {
            $url = "https://api.github.com/repos/{owner}/{repo}/branches/{branch}";
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
     * @return \GithubService\Model\RepoBranch
     */
    public function execute()
    {
        $request = $this->createRequest();
        $response = $this->api->execute($request);
        $this->response = $response;
        $instance = \GithubService\Model\RepoBranch::createFromResponse($response, $this);

        return $instance;
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
     * @return \GithubService\Model\RepoBranch
     * @param \Artax\Request $request The request to be processed
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->execute($request);
        $this->response = $response;
        $instance = \GithubService\Model\RepoBranch::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\RepoBranch
     * @param \Artax\Response $response The HTTP response.
     */
    public function processResponse(\Artax\Response $response)
    {
        $instance = \GithubService\Model\RepoBranch::createFromResponse($response, $this);

        return $instance;
    }


}
