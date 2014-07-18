<?php


namespace GithubService;


class RateLimitedGithubApi extends \GithubService\GithubAPI\GithubAPI {
    
    /**
     * @var \GithubService\RateLimit
     */
    private $rateLimit;

    public function callAPI(\Artax\Request $request, array $successStatuses = array()){
        $response = parent::callAPI($request, $successStatuses);
        $newRateLimit = \GithubService\RateLimit::createFromResponse($response);

        if ($newRateLimit != null) {
            $this->rateLimit = $newRateLimit;
        }

        return $response;
    }
}

 