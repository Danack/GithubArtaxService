<?php


namespace GithubService;

use Amp\Artax\Response;
use ArtaxServiceBuilder\Operation;
use ArtaxServiceBuilder\Service\GithubPaginator;
use GithubService\GithubArtaxService\GithubArtaxServiceException;


class ModelFactory
{
    /**
     * @param Response $response
     * @param Operation $operation Unused by the Github API currently. It maybe be required for other apis
     * where some data from the request is required to interpret the resonse.
     * @return static
     * @throws \GithubService\GithubArtaxService\GithubArtaxServiceException
     */
    private function decodeJson(Response $response)
    {
        $json = $response->getBody();
        $data = json_decode($json, true);

        if ($data === null) {
            $lastJsonError = json_last_error();
            throw new GithubArtaxServiceException($response, "Error parsing json, last json error: ".$lastJsonError);
        }

        //An error is set...but presumably not an error code if we arrived here.
        if (isset($data['error']) == true) {
            $errorDescription = 'error_description not set, so cause unknown.';

            if (isset($data["error_description"]) == true) {
                $errorDescription = $data["error_description"];
            }

            throw new GithubArtaxServiceException($response, 'Github error: '.$errorDescription);
        }
        
        return $data;
    }
    
    public function createFromResponse(Response $response, Operation $operation)
    {
        $data = $this->decodeJson($response);
        
        $class = 'GithubService\Model\Emojis';

        $instance = $this->instantiateClass($class, $data);

        //Header based information needs to be added after the array
        
        //Some of the data is embedded in a header.
        if ($response->hasHeader('X-OAuth-Scopes')) {
            $oauthHeaderValues = $response->getHeader('X-OAuth-Scopes');
            $oauthScopes = [];
            foreach ($oauthHeaderValues as $oauthHeaderValue) {
                $oauthScopes = explode(', ', $oauthHeaderValue);
            }
            $instance->oauthScopes = $oauthScopes;
        }
        
        $instance->pager = GithubPaginator::constructFromResponse($response);

        return $instance;
    }
    
    public function instantiateClass($classname, array $data)
    {
        $dataMapper = new GithubDataMapper();

        return $dataMapper->instantiate($classname, $data);
    }
}
