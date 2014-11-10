<?php


namespace GithubService\GithubArtaxService;

use Amp\Artax\Response;
use Amp\Artax\Request;
use Amp\Promise;
use ArtaxServiceBuilder\BadResponseException;
use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;
use GithubService\RateLimitException;
use ArtaxServiceBuilder\BasicAuthToken;


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
        $originalResponse = $operation->getOriginalResponse();
        $newRateLimit = \GithubService\RateLimit::createFromResponse($originalResponse);

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
        ) use ($callback, $operation) {

            $originalResponse = $operation->getOriginalResponse();
            
            if ($originalResponse) {
                $this->parseRateLimit($originalResponse);
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
            // Something went wrong when creating the ratelimit object
            // We don't care, the user only cares about the actual request. 
        }

        if ($status < 200 || ($status >= 300 && $status != 304)) {
            return new BadResponseException(
                "Status $status is not treated as OK.",
                $response
            );
        }

        return null;
    }

    /**
     * Creates an Oauth token for a named application, or retrieves the current Oauth 
     * token if one already exists for the named application.
     * 
     * @param $username string The username to create the oauth token for
     * @param $password string The password of the user
     * @param $enterPasswordCallback callable A callback to get the one-time password
     * if the user has two factor auth enabled on their account.
     * @param $scopes array The scopes/permissions that the token should 
     * have e.g. \GithubService\Github::SCOPE_USER_EMAIL and
     * https://developer.github.com/v3/oauth/#scopes 
     * @param $applicationName string The name of the application
     * @param $noteURL string The URL of application i.e. where a user should go to
     * find help for the application.
     * @param $maxAttempts int The maximum number of attempts. This only allows retries
     * for the two-factor auth failing, not the password
     *  
     * @return \GithubService\Model\Authorization
     */
    function createOrRetrieveAuth(
        $username,
        $password,
        callable $enterPasswordCallback,
        $scopes,
        $applicationName,
        $noteURL,
        $maxAttempts = 3
    ) {
        $basicToken = new BasicAuthToken($username, $password);

        $otp = false;

        for ($i = 0; $i < $maxAttempts; $i++) {
            try {
                $currentAuthCommand = $this->listAuthorizations($basicToken);

                if ($otp) {
                    $currentAuthCommand->setOtp($otp);
                }

                $currentAuths = $currentAuthCommand->execute();
                $currentAuth = $currentAuths->findNoteAuthorization($applicationName);

                if ($currentAuth) {
                    // Already have current auth, no need to create a new one.
                    return $currentAuth;
                }

                $createAuthToken = $this->createAuthToken(
                    $basicToken,
                    $scopes,
                    $applicationName,
                    $noteURL
                );
                
                if ($otp) {
                    $createAuthToken->setOtp($otp);
                }

                $authResult = $createAuthToken->execute();

                return $authResult;
            }
            catch (OneTimePasswordAppException $otpae) {
                $otp = $enterPasswordCallback(
                    "Please enter the code from your 2nd factor auth app:"
                );
            }
            catch (OneTimePasswordSMSException $otse) {
                $otp = $enterPasswordCallback(
                    "Please enter the code from the SMS Github should have sent you:"
                );
            }
        }

        throw new GithubArtaxServiceException("Failed to create or retrieve oauth token.");
    }
}

 