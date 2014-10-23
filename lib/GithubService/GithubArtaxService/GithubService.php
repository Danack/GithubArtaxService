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
     * Checks the rate limit info. Returns false if the rate limit is not hit.
     * Returns the time at which the rate limit will be reset if the rate limit
     * has been exceeded.
     */
    public function isRateLimitExceeded() {
        return false;
    }
    
    /**
     * @param Request $request
     * @param \ArtaxServiceBuilder\Operation $operation
     * @return Response
     * @throws
     */
    public function execute(Request $request, \ArtaxServiceBuilder\Operation $operation) {
        if ($this->isRateLimitExceeded() == true) {
            throw new RateLimitException();
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

        //We need to wrap the original callback to be able to get the rate limit info
        $extractRateLimitCallable = function (\Exception $e, $processedData, Response $response) use ($callback) {
            $newRateLimit = \GithubService\RateLimit::createFromResponse($response);
            if ($newRateLimit != null) {
                $this->rateLimit = $newRateLimit;
            }
            
            //Call the original callback
            $callback($e, $processedData, $response);
        };
        
        parent::executeAsync($request, $operation, $extractRateLimitCallable);
    }
    
    
    /**
     * @param Request $request
     * @param Response $response
     * @return BadResponseException|OneTimePasswordAppException|OneTimePasswordSMSException|null|string
     */
    public function translateResponseToException(Request $request, Response $response) {
        $status = $response->getStatus();
        
        if ($status == 406) {
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

        if ($status < 200 || ($status >= 300 && $status != 304)) {
            return new BadResponseException(
                "Status $status is not treated as OK.",
                $response
            );
        }

        return null;
    }
}

 