<?php 

namespace GithubService\Model;

use ArtaxServiceBuilder\Operation;
use Amp\Artax\Response;
use ArtaxServiceBuilder\BadResponseException;

class GistStarred
{
    use GithubTrait;
    use SafeAccess;
    
    public $iStarred = null;

    static function createFromResponse(Response $response, Operation $operation) {
        if ($response->getStatus() == 204) {
            $instance = new static();
            $instance->iStarred = true;
            return $instance;
        }
        else if ($response->getStatus() == 404) {
            $instance = new static();
            $instance->iStarred = false;
            return $instance;
        }

        throw new BadResponseException("Unexpected status of ".$response->getStatus());
    }
}
