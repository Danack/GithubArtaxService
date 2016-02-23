<?php

$autoloader = require __DIR__.'/../vendor/autoload.php';

use GithubService\GithubArtaxService\GithubService;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\FileResponseCache;


$github = new GithubService(
    new ArtaxClient(),
    \Amp\reactor(),
    new FileResponseCache(__DIR__."/fileCache"),
    'Danack/GithubArtaxService' //Change this to your github name/project
);

$command = $github->listRepoTags(
    null,   //No authentication means we will be IP limited to 50 requets /hour
    'php',
    'php-src'
);

$listRepoTags = $command->execute();

$statusCode = $command->getOriginalResponse()->getStatus();

if ($statusCode == 304) {
    echo "YAY! 304 response so data read from cache. This request did not count against the rate limit.\n";
}
else {
    echo "Cache miss.\n";
}

$rateLimit = $github->getRateLimit();

//Alternatively you can create the rate limit object from the original response
//$rateLimit = \GithubService\RateLimit::createFromResponse($command->getOriginalResponse());

if ($rateLimit) {
    echo sprintf(
        "Rate limit info:\n  Remaining: %d\n  Reset time: %d\n",
        $rateLimit->remaining,
        $rateLimit->resetTime
    );
}
else {
    echo "No rate limit information was in the response.\n";
}

