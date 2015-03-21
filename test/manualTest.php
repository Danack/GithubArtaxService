<?php


use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;


require_once "testBootstrap.php";


$injector = createProvider();

$reactor = \Amp\getReactor();
$cache = new NullResponseCache();
$client = new ArtaxClient($reactor);
$client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
$client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);
$githubAPI = new GithubArtaxService($client, $reactor, $cache, "Danack/test");

$foo = $githubAPI->getArchiveLink(
    null,
    'Danack',
    'Imagick-demos',
    '8b22bb534407100ee6f2c8b6caa183b5b5aead59'
);

$result = $foo->execute();

file_put_contents("./foo.tar.gz", $result);

echo "all okay.";



