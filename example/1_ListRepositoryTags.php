<?php

$autoloader = require __DIR__.'/../vendor/autoload.php';

use GithubService\GithubArtaxService\GithubService;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use GithubService\Model\RepoTags;


function displayTags(RepoTags $repoTags) {
    foreach ($repoTags as $nextRepoTag) {
        echo "Found tag: ".$nextRepoTag->name."\n";
    }
}


$github = new GithubService(
    new ArtaxClient(),
    new NullResponseCache(), //This is just an example, we don't cache anything
    'Danack/GithubArtaxService' //Change this to your github name/project
);

echo "Tags on first page:\n";
//Get the first page of data
$command = $github->listRepoTags(
    null,   //No authentication means we will be IP limited to 50 requets /hour
    'php',
    'php-src'
);

$repoTags = $command->execute();
displayTags($repoTags);

