<?php


use GithubService\GithubArtaxService\GithubService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\Oauth2Token;
use GithubService\Model\HydratorException;

require_once "testBootstrap.php";

$injector = createProvider();

$reactor = \Amp\getReactor();
$cache = new NullResponseCache();
$client = new ArtaxClient($reactor);
$client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
$client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);
$githubAPI = new GithubService($client, $reactor, $cache, "Danack/test");

$token = @file_get_contents("../../GithubToken.txt");
$oauthToken = null;

if ($token) {
    $oauthToken = new Oauth2Token($token);
}

try {
    $tagListRequest = $githubAPI->listRepoTags(null, "Danack", "GithubArtaxService");
    $tagList = $tagListRequest->execute();

    foreach ($tagList as $tag) {
        /** @var $tag \GithubService\Model\Tag */
        printf("tag name %s, commmit %s \n",
            $tag->name,
            $tag->commit->sha
        );
    }

    $emojiResult = $githubAPI->listEmojis(null)->execute();
    
    foreach ($emojiResult->emojis as $emoji) {
        echo $emoji->name." \n";
    }  
}
catch (BadResponseException $bre) {
    echo "Bad response: ". $bre->getResponse()->getBody()."\n";
    echo "Uri was: ".$bre->getResponse()->getOriginalRequest()->getUri()."\n";
}
catch (HydratorException $dme) {
    echo $dme->displayProblem();
}
