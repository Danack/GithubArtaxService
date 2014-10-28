<?php


namespace GithubService;

use Amp\Artax\Response;

class RateLimit {

    public $limit;

    public $remaining;
    
    public $resetTime;

    //Values come from the headers:
    //'X-RateLimit-Limit' => 5000
    //'X-RateLimit-Remaining' => 4989
    //'X-RateLimit-Reset' => 1405170314

    public function __construct($limit, $remaining, $resetTime) {
        $this->limit = intval($limit);
        $this->remaining = intval($remaining);
        $this->resetTime = intval($resetTime);
    }

    /**
     * @param $numberOfRequests
     */
    public function checkLimit($numberOfRequests) {
        $this->remaining -= intval($numberOfRequests);
        if ($this->remaining <= 0) {
            return $this->resetTime;
        }
        
        return true;
    }
    
    /**
     * @param Response $response
     * @return \GithubService\RateLimit|null
     */
    public static function createFromResponse(Response $response) {
        $limit = null;
        $remaining = null;
        $resetTime = null;

        $limitHeaders = $response->getHeader('X-RateLimit-Limit');
        foreach ($limitHeaders as $value) {
            $limit = $value;
        }
        
        $remainingHeaders = $response->getHeader('X-RateLimit-Remaining');
        foreach ($remainingHeaders as $value) {
            $remaining = $value;
        }
        
        $resetTimeHeaders = $response->getHeader('X-RateLimit-Reset');
        foreach ($resetTimeHeaders as $value) {
            $resetTime = $value;
        }
        
        if ($limit !== null && $remaining !== null && $resetTime !== null) {
            return new RateLimit($limit, $remaining, $resetTime);
        }
        
        return null;
    }
}

 