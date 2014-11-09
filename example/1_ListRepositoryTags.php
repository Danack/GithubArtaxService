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



echo "Following pagination:\n";
// All github services are paged with RFC 5988 https://tools.ietf.org/html/rfc5988
// I don't think this is appropriate for an api. It's fine for web content, where there
// is no clear mapping from input to output, but for a defined api, it seems dumb.
if ($repoTags->pager) {
    $pages = $repoTags->pager->getAllKnownPages();
    foreach ($pages as $page) {
        echo "Page: ".$page."\n";
        $command = $github->listRepoTagsPaginate(
            null,
            $page
        );
        $nextRepoTags = $command->execute();
        displayTags($nextRepoTags);
    }
}


