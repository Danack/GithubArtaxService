<?php

use GithubService\GithubArtaxService\GithubService;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use ArtaxServiceBuilder\Oauth2Token;

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



/**
 * @param $instruction
 * @return string
 */
$enterPasswordCallback = function ($instruction) {
    echo $instruction."\n";
    $oneTimePassword = trim(fgets(STDIN));

    return $oneTimePassword;
};

$noteURL = 'http://www.github.com/danack/GithubArtaxService';
$applicationName = 'GetOauthTokenTest';
// List of the scopes required. An empty list is used to get a token
// with no access, just to avoid the 50 reqs/hour limit for unsigned
// api calls. 
$scopes = []; 

try {

    //Attempt to either create or retrieve an Oauth token
    $authResult = $github->createOrRetrieveAuth(
        $username,
        $password,
        $enterPasswordCallback,
        $scopes,
        $applicationName,
        $noteURL,
        $maxAttempts = 3
    );

    echo "Token is: ".$authResult->token.", keep it secret.\n";
}
catch(ArtaxServiceBuilder\BadResponseException $badResponseException) {
    echo "Something went wrong trying to retrieve an oauth token:\n";
    echo $badResponseException->getMessage();
    exit(-1);
}


// Okay we have an authorization, lets test it.
// This api call will be signed and so able to do 5000 requests per hour
$repoTags = $github->listRepoTags(
    $authResult,
    'Danack',
    'GithubArtaxService'
)->execute();


foreach ($repoTags as $nextRepoTag) {
    echo "Found tag: ".$nextRepoTag->name."\n";
}
