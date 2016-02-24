<?php

/**
 * This example gives a basic example of how to use asynchrnous calls
 * to perform HTTP requests in a true parallel (but not multi-threaded) way.
 */


$autoloader = require __DIR__.'/../vendor/autoload.php';


use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\Response;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use GithubService\GithubArtaxService\GithubService;
use GithubService\Model\Tags;


// Create the appropriate Amp reactor for your system. This depends on
// which extensions you have loaded:
// uv extension -  UvReactor;
// libevent extension - LibeventReactor;
// otherwise a NativeReactor is used.
$reactor = \Amp\reactor();

$artaxClient = new ArtaxClient();


// The reactor keeps running while the socket is open. Set a short
// timeout to avoid waiting around too long
$artaxClient->setOption(
    \Amp\Artax\Client::OP_MS_KEEP_ALIVE_TIMEOUT,
    1    // 3 seconds
);

// Create the GithubService with the prepared client
$github = new GithubService(
    $artaxClient,
    $reactor,
    new NullResponseCache(), //This is just an example, we don't cache anything
    'Danack/GithubArtaxService' // Change this to your github name/project
);


//Get the first page of data
$command = $github->listRepoTags(
    null,   //No authentication means we will be IP limited to 50 requets /hour
    'php',
    'php-src'
);


$listRepoTagsCallback = function (
    Exception $exception = null, 
    Tags $repoTags,
    Response $response = null) use ($github) {

    if ($exception) {
        echo "An error occurred: ".$exception->getMessage();
        return;
    }
    
    echo "Tags on first page:\n";
    foreach ($repoTags as $repoTag) {
        echo "Found tag: ".$repoTag->name."\n";
    }

    $pages = $repoTags->pager->getAllKnownPages();
    foreach ($pages as $page) {
        $command = $github->listRepoTagsPaginate(
            null,
            $page
        );

        $callback = getListRepoTagsPagingCallback($page);
        echo "Fetching asynchronously: $page \n";
        $command->executeAsync($callback);
    }
    
};

// This prepares the request but it is not executed until the reactor starts running
$repoTags = $command->executeAsync($listRepoTagsCallback);

$time = microtime(true);
// So start the reactor
$reactor->run();

echo "fin: ".(microtime(true) - $time)."\n";


/**
 * Create a callback for processing the response from listRepoTagsPaginate.
 * All this is doing is 'closing over' the $page variable, so that it can be used
 * when processing the response.
 * @param $page
 * @return callable
 */
function getListRepoTagsPagingCallback($page) {

    $listRepoTagsPagingCallback = function (Exception $exception = null,
                                            Tags $repoTags = null,
                                            Response $response = null) use ($page) {

        if ($exception) {
            echo "An error occurred: ".$exception->getMessage();
            return;
        }

        $output = "Results for page: ".$page."\n";
        foreach ($repoTags as $repoTag) {
            $output .= "Found tag: ".$repoTag->name."\n";
        }

        echo $output;
    };

    return $listRepoTagsPagingCallback;
}
