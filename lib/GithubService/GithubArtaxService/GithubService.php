<?php


namespace GithubService\GithubArtaxService;

use Amp\Artax\Response;
use Amp\Artax\Request;
use Amp\Promise;
use ArtaxServiceBuilder\BadResponseException;
use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;
use GithubService\RateLimitException;


/**
 * Class GithubService 
 * This class provides some functionality that is not easily possible to implement through 
 * the service description.
 * @package GithubService\GithubArtaxService
 */
class GithubService extends GithubArtaxService {


    /**
     * @var \GithubService\RateLimit
     */
    private $rateLimit;

    /**
     * @return \GithubService\RateLimit
     */
    public function getRateLimit() {
        return $this->rateLimit;
    }


    
    /**
     * @param Request $request
     * @param \ArtaxServiceBuilder\Operation $operation
     * @return Response
     * @throws
     */
    public function execute(Request $request, \ArtaxServiceBuilder\Operation $operation) {
        $rateLimitException = $this->checkRateLimitException();
        
        if ($rateLimitException) {
            throw $rateLimitException;
        }
        
        $response = parent::execute($request, $operation);
        $newRateLimit = \GithubService\RateLimit::createFromResponse($response);

        if ($newRateLimit != null) {
            $this->rateLimit = $newRateLimit;
        }

        return $response; 
    }

    /**
     * @param Request $request
     * @param \ArtaxServiceBuilder\Operation $operation
     * @param callable $callback
     * @return Promise|void
     */
    public function executeAsync(Request $request, \ArtaxServiceBuilder\Operation $operation, callable $callback) {

        $rateLimitException = $this->checkRateLimitException();
        
        if ($rateLimitException) {
            $callback($rateLimitException, null, null);
        }
        
        //We need to wrap the original callback to be able to get the rate limit info
        $extractRateLimitCallable = function (
            \Exception $e = null, 
            $processedData,     //This will be of the type returned by the operation
            Response $response = null
        ) use ($callback) {
            if ($response) {
                $this->parseRateLimit($response);
            }
            //Call the original callback
            $callback($e, $processedData, $response);
        };

        parent::executeAsync($request, $operation, $extractRateLimitCallable);
    }

    /**
     * @return RateLimitException|null
     */
    function checkRateLimitException() {

        if (!$this->rateLimit) {
            return null;
        }

        $resetTime = $this->rateLimit->checkLimit(1);
        if ($resetTime === true) {
            return null;
        }

        return new RateLimitException($resetTime, "Rate limit reached, resets at $resetTime");
    }
    
    /**
     * Try to get some rate limiting info from the response, and store it if it is
     * available.
     * @param Response $response
     */
    function parseRateLimit(Response $response) {
        $newRateLimit = \GithubService\RateLimit::createFromResponse($response);
        if ($newRateLimit != null) {
            $this->rateLimit = $newRateLimit;
        }
    }
    
    
    
    /**
     * @param Request $request
     * @param Response $response
     * @return BadResponseException|OneTimePasswordAppException|OneTimePasswordSMSException|null|string
     */
    public function translateResponseToException(Response $response) {
        $status = $response->getStatus();
        
        if ($status == 401 || $status == 406) {
            //@TODO - find a list of what the status codes are meant to be.
            if ($response->hasHeader('X-GitHub-OTP')) {
                $otpArray = $response->getHeader('X-GitHub-OTP');
                foreach ($otpArray as $otp) {
                    if (stripos($otp, "sms") !== false) {
                        return new OneTimePasswordSMSException(
                            "SMS OTP required",
                            $response
                        );
                    }
                    if (stripos($otp, "app") !== false) {
                        return new OneTimePasswordAppException(
                            "App OTP required",
                            $response
                        );
                    }
                }
            }
        }
        
        try {
            $newRateLimit = \GithubService\RateLimit::createFromResponse($response);
            if ($newRateLimit) {
                if ($newRateLimit->remaining <= 0) {
                    $resetsInSeconds = $newRateLimit->resetTime - time();
                    return new BadResponseException(
                        "Request rate limit has been exceeded, try again in $resetsInSeconds seconds.",
                        $response
                    );
                }
            }
        }
        catch (\Exception $e) {
            //We don't care.
        }
            
        

        if ($status < 200 || ($status >= 300 && $status != 304)) {
            return new BadResponseException(
                "Status $status is not treated as OK.",
                $response
            );
        }

        return null;
    }
}

 