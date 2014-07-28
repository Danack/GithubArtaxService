<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised if any changes to this file are over-written.
//
namespace GithubService\Operation;

class listRepoCommits implements \ArtaxServiceBuilder\Operation
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

    public function __construct(\GithubService\GithubArtaxService\GithubArtaxService $api, $Authorization, $userAgent, $owner, $repo)
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
        if (array_key_exists('owner', $params)) {
             $this->parameters['owner'] = $params['owner'];
        }
        if (array_key_exists('repo', $params)) {
             $this->parameters['repo'] = $params['repo'];
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

    public function setPath($path)
    {
        $this->parameters['path'] = $path;
    }

    public function setAuthor($author)
    {
        $this->parameters['author'] = $author;
    }

    public function setSince($since)
    {
        $this->parameters['since'] = $since;
    }

    public function setUntil($until)
    {
        $this->parameters['until'] = $until;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return \GithubService\Model\Commits
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
        $url = "https://api.github.com/repos/{owner}/{repo}/commits";
        $request->setMethod('GET');
        $queryParameters = [];


        $uriTemplate = new \ArtaxServiceBuilder\Service\UriTemplate\UriTemplate();
        $url = $uriTemplate->expand($url, $this->parameters);
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
        $value = $this->getFilteredParameter('owner');
        $queryParameters['owner'] = $value;
        $value = $this->getFilteredParameter('repo');
        $queryParameters['repo'] = $value;
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
        $response = $this->api->execute($request);
        $this->response = $response;

        return $response;
    }

    /**
     * Execute the operation
     *
     * @return \GithubService\Model\Commits
     */
    public function execute()
    {
        $request = $this->createRequest();
        $response = $this->api->execute($request);
        $this->response = $response;
        $instance = \GithubService\Model\Commits::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\Commits
     */
    public function dispatch(\Artax\Request $request)
    {
        $response = $this->api->execute($request);
        $this->response = $response;
        $instance = \GithubService\Model\Commits::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response.Allows you to
     * modify the request before it is sent.
     *
     * @return \GithubService\Model\Commits
     */
    public function processResponse(\Artax\Response $response)
    {
        $instance = \GithubService\Model\Commits::createFromResponse($response, $this);

        return $instance;
    }


}
