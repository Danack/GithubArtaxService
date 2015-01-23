<?php

use GithubService\GithubArtaxService\GithubArtaxService;
use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\Response;
use Amp\NativeReactor;


/**
 * Class IntegrationTest
 * @group integration
 */
class IntegrationTest extends \PHPUnit_Framework_TestCase {

    private function  getReactorAndClient() {
        $reactor = new NativeReactor();
        $client = new ArtaxClient($reactor);
        $client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
        $client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);

        return [$reactor, $client];
    }
    
    
    function testGoogle() {
        list($reactor, $client) = $this->getReactorAndClient();
        /** @var  $client ArtaxClient */
        $promise = $client->request("http://www.google.com");
        $response = \Amp\wait($promise, $reactor);
        /** @var $response Response */
        $this->assertEquals(200, $response->getStatus());
    }

    function testError() {
        $this->setExpectedException('Amp\Dns\ResolutionException');
        list($reactor, $client) = $this->getReactorAndClient();
        /** @var  $client ArtaxClient */
        $client->setOption(ArtaxClient::OP_HOST_CONNECTION_LIMIT, 3);
        $promise = $client->request("http://doesntexist.test");
        \Amp\wait($promise, $reactor);
    }


    /**
     * Test that calling listRepoTags
     */
    function testSynchronousGithub() {
        $provider = createProvider([], []);
        $githubArtaxService = $provider->make('GithubService\GithubArtaxService\GithubArtaxService');
        /** @var $githubArtaxService GithubArtaxService */
        $result = $githubArtaxService->listRepoTags(null, 'Danack', 'GithubArtaxService')->execute();
        $this->assertInstanceOf('GithubService\Model\RepoTags', $result);
        $this->assertTrue(is_array($result->repoTags), "repo tags is meant to be an array");
        //This could break if we ever delete tags.
        $this->assertGreaterThanOrEqual(3, count($result->repoTags));
    }

    
    function testAsynchronousGithub() {
        $provider = createProvider([], []);
        $githubArtaxService = $provider->make('GithubService\GithubArtaxService\GithubArtaxService');

        $reactor = $provider->make('Amp\Reactor');
        
        $errorExternal = null;

        /** @var  $repoTagsExternal \GithubService\Model\RepoTags */
        $repoTagsExternal = null;
        
        $callback = function(\Exception $error = null, GithubService\Model\RepoTags $repoTags = null) use (&$errorExternal, &$repoTagsExternal) {
            $errorExternal = $error;
            $repoTagsExternal = $repoTags;
        };

        /** @var $githubArtaxService GithubArtaxService */
        $promise = $githubArtaxService->listRepoTags(null, 'Danack', 'GithubArtaxService')->executeAsync($callback);
        \Amp\wait($promise, $reactor);

        $errorMessage = "Placeholder for exception message.";
        if ($errorExternal) {
            /** @var $errorExternal \Exception */
            $errorMessage = "Unexpected error ".$errorExternal->getMessage();
        }
        
        $this->assertNull($errorExternal, $errorMessage);
        $this->assertInstanceOf('GithubService\Model\RepoTags', $repoTagsExternal);
        $this->assertTrue(is_array($repoTagsExternal->repoTags), "repo tags is meant to be an array");
        //This could break if we ever delete tags.
        $this->assertGreaterThanOrEqual(3, count($repoTagsExternal->repoTags));
    }
}