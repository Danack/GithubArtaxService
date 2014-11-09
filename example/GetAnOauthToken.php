<?php

use GithubService\GithubArtaxService\GithubService;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use ArtaxServiceBuilder\BasicAuthToken;
use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;

$autoloader = require __DIR__.'/../vendor/autoload.php';

$github = new GithubService(
    new ArtaxClient(),
    new NullResponseCache(), //This is just an example, we don't cache anything
    'Danack/GithubArtaxService' //Change this to your github name/project
);


echo "Enter username:\n";
$username = trim(fgets(STDIN));


echo "Enter password:\n";
$password = trim(fgets(STDIN));


$applicationName = 'GetOauthTokenTest';


/**
 * @param $instruction
 * @return string
 */
$enterPasswordCallback = function ($instruction) {
    echo $instruction."\n";
    $oneTimePassword = trim(fgets(STDIN));

    return $oneTimePassword;
};

$applicationName = 'GithubArtaxTesting';
$noteURL = 'http://www.github.com/danack/GithubArtaxService';

// List of the scopes required. An empty list is used to get a token
// with no access, just to avoid the 50 reqs/hour limit for unsigned
// api calls. 
$scopes = []; 

try {

    $authResult = $github->createOrRetrieveAuth(
        $username,
        $password,
        $enterPasswordCallback,
        $scopes,
        $applicationName,
        $noteURL,
        $maxAttempts = 3
    );

    echo "Token is: ".$authResult->token.", keep it secret.";
}
catch(ArtaxServiceBuilder\BadResponseException $badResponseException) {
    echo "Something went wrong trying to retrieve an oauth token:\n";
    echo $badResponseException->getMessage();
}