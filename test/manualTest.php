<?php


use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\Oauth2Token;
use GithubService\Model\DataMapperException;


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

$token = @file_get_contents("../../GithubToken.txt");
$oauthToken = null;

if ($token) {
    $oauthToken = new Oauth2Token($token);
}


try {
    
    $tagListRequest = $githubAPI->listRepoTags(null, "J7mbo", "twitter-api-php");

    $tagList = $tagListRequest->execute();

    foreach ($tagList as $tag) {
        /** @var $tag \GithubService\Model\Tag */
        printf("tag name %s, commmit %s \n",
            $tag->name,
            $tag->commit->sha
        );
    }
    
    
//    $result = $githubAPI->listEmojis(null)->execute();
//    $result = $githubAPI->listUsersGists(null, 'danack')->execute();
//    $result = $githubAPI->listUserRepos(null, 'Danack')->execute();
    //$result = $githubAPI->checkGistStarred($oauthToken, '6bd30de6247bc5148986')->execute();

    //$result = $githubAPI->listGitIgnoreTemplates($oauthToken->__toString())->execute();
    
//    foreach ($result as $templateName) {
//        echo $templateName."\n";
//    }

    // Accept: application/vnd.github.v3.full+json

//    $templateCommand = $githubAPI->getGitIgnoreTemplate($oauthToken->__toString(), 'Rails');
//    $templateCommand->setAccept('application/vnd.github.v3.full+json');
//    $template = $templateCommand->execute();    
//    var_dump($templateCommand->getResponse()->getBody());    
}
catch (BadResponseException $bre) {
    echo "Bad response: ". $bre->getResponse()->getBody()."\n";
    echo "Uri was: ".$bre->getResponse()->getOriginalRequest()->getUri()."\n";
}
catch (DataMapperException $dme) {
    echo $dme->displayProblem();
}
