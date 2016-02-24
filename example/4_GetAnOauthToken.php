<?php

use ArtaxServiceBuilder\Oauth2Token;
use GithubService\GithubArtaxService\GithubService;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;

$autoloader = require __DIR__.'/../vendor/autoload.php';

$github = new GithubService(
    new ArtaxClient(),
    \Amp\reactor(),
    new NullResponseCache(), //This is just an example, we don't cache anything
    'Danack/GithubArtaxService' //Change this to your github name/project
);

$tokenFileLocation = __DIR__."/../../github_oauth_token.txt";

$existingToken = @file_get_contents($tokenFileLocation);
$existingToken = trim($existingToken);

if ($existingToken) {
    echo "Using token from file $tokenFileLocation \n";
    $token = new Oauth2Token($existingToken);
}
else {
    echo "Enter username:\n";
    $username = trim(fgets(STDIN));

    echo "Enter password (warning - not masked for this example):\n";
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
    $note = "Testing Oauth creation: ".time(); //This must be unique to create a new Oaut key
    
    // List of the scopes required. An empty list is used to get a token
    // with no access, just to avoid the 50 reqs/hour limit for unsigned
    // api calls. 
    $scopes = [\GithubService\GithubArtaxService\GithubService::SCOPE_PUBLIC_REPO];

    try {
        //Attempt to either create or retrieve an Oauth token
        $authResult = $github->createOrRetrieveAuth(
            $username,
            $password,
            $enterPasswordCallback,
            $scopes,
            $note,
            $maxAttempts = 3
        );

        echo "Token is: ".$authResult->token.", keep it secret.\n";
        file_put_contents($tokenFileLocation, $authResult->token);
        echo "Token stored in ".$tokenFileLocation."\n";
    }
    catch (ArtaxServiceBuilder\BadResponseException $badResponseException) {
        echo "Something went wrong trying to retrieve an oauth token:\n";
        echo $badResponseException->getMessage();
        echo "Body is:\n";
        var_dump($badResponseException->getResponse()->getBody());
        echo "\n";
        exit(-1);
    }

    $token = $authResult;
}

// Okay we have an authorization, lets test it.
// This api call will be signed and so able to do 5000 requests per hour
$repoTags = $github->listRepoTags(
    $token,
    'Danack',
    'GithubArtaxService'
)->execute();


foreach ($repoTags as $nextRepoTag) {
    echo "Found tag: ".$nextRepoTag->name."\n";
}
