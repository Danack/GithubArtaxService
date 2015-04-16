<?php


use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\BadResponseException;


require_once "testBootstrap.php";


$injector = createProvider();

$reactor = \Amp\getReactor();
$cache = new NullResponseCache();
$client = new ArtaxClient($reactor);
$client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
$client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);
$githubAPI = new GithubArtaxService($client, $reactor, $cache, "Danack/test");

//$foo = $githubAPI->getArchiveLink(
//    null,
//    'Danack',
//    'Imagick-demos',
//    '8b22bb534407100ee6f2c8b6caa183b5b5aead59'
//);


try {

    $listEmojisCommand = $githubAPI->listEmojis(null);
    $result = $listEmojisCommand->execute();

    $result = $githubAPI->listUsersGists(null, 'danack')->execute();
    var_dump($result);

//file_put_contents("./foo.tar.gz", $result);

    var_dump($result);

    echo "all okay.";


}
catch (BadResponseException $bre) {
    echo "Bad response: ". $bre->getResponse()->getBody()."\n";
    echo "Uri was: ".$bre->getResponse()->getOriginalRequest()->getUri()."\n";
}

