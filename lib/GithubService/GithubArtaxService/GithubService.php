<?php


namespace GithubService\GithubArtaxService;

use Amp\Artax\Client;
use Amp\Artax\Response;
use Amp\Artax\Request;
use Amp\Promise;
use Amp\Reactor;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\BasicAuthToken;
use ArtaxServiceBuilder\Operation;
use ArtaxServiceBuilder\ResponseCache;
use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;
use GithubService\RateLimitException;
use GithubService\GithubHydratorRegistry;

/**
 * Class GithubService 
 * This class provides some functionality that is not easily possible to implement through 
 * the service description.
 * @package GithubService\GithubArtaxService
 */
class GithubService extends GithubArtaxService
{
    protected $githubHydratorRegistry;
    
    /**
     * @var \GithubService\RateLimit
     */
    private $rateLimit;

    public function __construct(Client $client, Reactor $reactor, ResponseCache $responseCache, $userAgent = null)
    {
        if ($userAgent === null) {
            $userAgent = 'GithubArtaxService';
        }
        
        parent::__construct($client, $reactor, $responseCache, $userAgent);
        $this->githubHydratorRegistry = new GithubHydratorRegistry();
    }

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

    public function instantiateResult(Response $response, Operation $operation)
    {
        $instantiationInfo = $operation->getResultInstantiationInfo();
        if ($instantiationInfo !== null) {
            if (array_key_exists('instantiate', $instantiationInfo) == true) {
                $classname = $instantiationInfo['instantiate'];
                return $this->githubHydratorRegistry->createFromResponse($response, $operation, $classname);
            }
        }

        return $response->getBody();
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
     * Creates an Oauth token for a named application.
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
     * @return \GithubService\Model\OauthAccess
     */
    function createOrRetrieveAuth(
        $username,
        $password,
        callable $enterPasswordCallback,
        $scopes,
        $note,
        $noteURL = "http://www.github.com/danack/GithubArtaxService",
        $maxAttempts = 3
    ) {
        $basicToken = new BasicAuthToken($username, $password);
        $otp = false;

        for ($i = 0; $i < $maxAttempts; $i++) {
            try {
                $createAuthToken = $this->createAuthorization(
                    $basicToken->__toString(),
                    $scopes,
                    $note
                );

                $createAuthToken->setNote_url($noteURL);
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

    
    /**
     * @param $clientID
     * @param $scopes
     * @param $redirectURI
     * @param $secret
     * @return string
     */
    public static function createAuthURL($clientID, $scopes, $redirectURI, $secret) {
        $url = "https://github.com/login/oauth/authorize";
        $url .= '?client_id='.urlencode($clientID);
        $url .= '&scope='.urlencode(implode(',', $scopes));
        //$url .= '&redirect_uri='.urlencode($redirectURI);
        $url .= '&state='.urlencode($secret);
    
        return $url;
    }



    //(no scope) Grants read-only access to public information (includes public user profile info, public repository info, and gists)

    const SCOPE_USER = 'user'; //	Grants read/write access to profile info only. Note that this scope includes user:email and user:follow.

    const SCOPE_USER_EMAIL = 'user:email'; //	Grants read access to a user’s email addresses.

    const SCOPE_USER_FOLLOW = 'user:follow'; //	Grants access to follow or unfollow other users.
    
    const SCOPE_PUBLIC_REPO = 'public_repo'; //	Grants read/write access to code, commit statuses, and deployment statuses for public repositories and organizations.

    const SCOPE_REPO = 'repo'; //	Grants read/write access to code, commit statuses, and deployment statuses for public and private repositories and organizations.

    const SCOPE_REPO_DEPLOYMENT = 'repo_deployment'; //	Grants access to deployment statuses for public and private repositories. This scope is only necessary to grant other users or services access to deployment statuses, without granting access to the code.

    const SCOPE_REPO_STATUS = 'repo:status'; //	Grants read/write access to public and private repository commit statuses. This scope is only necessary to grant other users or services access to private repository commit statuses without granting access to the code.

    const SCOPE_DELETE_REPO = 'delete_repo'; //	Grants access to delete adminable repositories.

    const SCOPE_NOTIFICATIONS = 'notifications'; //	Grants read access to a user’s notifications. repo also provides this access.

    const SCOPE_GIST = 'gist'; //	Grants write access to gists.

    const SCOPE_REPO_HOOK_READ = 'read:repo_hook'; //	Grants read and ping access to hooks in public or private repositories.
    const SCOPE_REPO_HOOK_WRITE = 'write:repo_hook'; //	Grants read, write, and ping access to hooks in public or private repositories.
    const SCOPE_REPO_HOOK_ADMIN = 'admin:repo_hook'; //	Grants read, write, ping, and delete access to hooks in public or private repositories.

    const SCOPE_ORG_READ = 'read:org'; //	Read-only access to organization, teams, and membership.
    const SCOPE_ORG_WRITE = 'write:org'; //	Publicize and unpublicize organization membership.

    const SCOPE_ORG_ADMIN = 'admin:org'; //	Fully manage organization, teams, and memberships.

    const SCOPE_PUBLIC_KEY_READ = 'read:public_key'; //	List and view details for public keys.
    const SCOPE_PUBLIC_KEY_WRITE  = 'write:public_key'; //	Create, list, and view details for public keys.
    const SCOPE_PUBLIC_KEY_ADMIN = 'admin:public_key'; //	Fully manage public keys.

    static public $scopeDescriptions = [
        self::SCOPE_USER => "Grants read/write access to profile info only. Note that this scope includes user:email and user:follow.",
        self::SCOPE_USER_EMAIL => 'Grants read access to a user’s email addresses.',
        self::SCOPE_USER_FOLLOW => "Grants access to follow or unfollow other users.",
        self::SCOPE_PUBLIC_REPO => "Grants read/write access to code, commit statuses, and deployment statuses for public repositories and organizations.",
        self::SCOPE_REPO => "Grants read/write access to code, commit statuses, and deployment statuses for public and private repositories and organizations.",
        self::SCOPE_REPO_DEPLOYMENT => "Grants access to deployment statuses for public and private repositories. This scope is only necessary to grant other users or services access to deployment statuses, without granting access to the code.",
        self::SCOPE_REPO_STATUS => "Grants read/write access to public and private repository commit statuses. This scope is only necessary to grant other users or services access to private repository commit statuses without granting access to the code.",
        self::SCOPE_DELETE_REPO => "Grants access to delete adminable repositories.",
        self::SCOPE_NOTIFICATIONS => "Grants read access to a user’s notifications. repo also provides this access.",
        self::SCOPE_GIST => "Grants write access to gists.",
        self::SCOPE_REPO_HOOK_READ => "Grants read and ping access to hooks in public or private repositories.",
        self::SCOPE_REPO_HOOK_WRITE => "Grants read, write, and ping access to hooks in public or private repositories.",
        self::SCOPE_REPO_HOOK_ADMIN => "Grants read, write, ping, and delete access to hooks in public or private repositories.",
        self::SCOPE_ORG_READ => "Read-only access to organization, teams, and membership.",
        self::SCOPE_ORG_WRITE => "Publicize and unpublicize organization membership.",
        self::SCOPE_ORG_ADMIN => "Fully manage organization, teams, and memberships.",
        self::SCOPE_PUBLIC_KEY_READ => "List and view details for public keys.",
        self::SCOPE_PUBLIC_KEY_WRITE  => "Create, list, and view details for public keys.",
        self::SCOPE_PUBLIC_KEY_ADMIN => "Fully manage public keys.",
    ];
}

 