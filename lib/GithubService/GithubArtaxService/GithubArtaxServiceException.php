<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//

namespace GithubService\GithubArtaxService;

use Amp\Artax\Response;

class GithubArtaxServiceException extends \Exception {

    /**
     * @var \Amp\Artax\Response
     */
    private $response;
    
    function __construct(Response $response, $message = "", $code = 0, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }
    
    function getResponse() {
        return $this->response;
    }
}
