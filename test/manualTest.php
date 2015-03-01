<?php


use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\Oauth2Token;


require_once "testBootstrap.php";


$injector = createProvider();


$reactor = \Amp\getReactor();
$cache = new NullResponseCache();
$client = new ArtaxClient($reactor);
$client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
$client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);
$githubAPI = new GithubArtaxService($client, $reactor, $cache, "Danack/test");

//$oauthToken = new Oauth2Token('12345');

$foo = $githubAPI->getArchiveLink(
    null,//$oauthToken,
    'Danack',
    'Configurator',
    'd5b1adecbf7d2d38bac05630d58bd85dfec1d7a3'
);

$result = $foo->execute();

file_put_contents("./foo.tar.gz", $result);





