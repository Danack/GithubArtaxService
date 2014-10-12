<?php

use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Artax\Client as ArtaxClient;
use Alert\NativeReactor;

class GithubTest extends \PHPUnit_Framework_TestCase {


    private function  getReactorAndAPI() {

        $reactor = new NativeReactor();
        $cache = new NullResponseCache();
        $client = new ArtaxClient($reactor);
        $client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1);
        $githubAPI = new GithubArtaxService($client, $cache, "Danack/test");
        
        return [$reactor, $githubAPI];
    }


    /**
     * @group internet
     */
    function testRepoTags() {
        /** @var  $githubAPI GithubArtaxService */
        list($reactor, $githubAPI) = $this->getReactorAndAPI();
        $command = $githubAPI->listRepoTags(null, "Danack", "GithubArtaxService");
        $repoTags = $command->call();
        $this->assertInstanceOf('GithubService\Model\RepoTags', $repoTags);
        $numberOfTags = count($repoTags->repoTags);
        $this->assertGreaterThanOrEqual(4, $numberOfTags);
    }
    

    /**
     * @group internet
     */
    function testRepoTagsAsync() {

        list($reactor, $githubAPI) = $this->getReactorAndAPI();
        
        /** @var  $githubAPI GithubArtaxService */
        $command = $githubAPI->listRepoTags(null, "Danack", "GithubArtaxService");
        

        $callbackCalled = false;

        $callback = function (
            \Exception $error = null,
            \GithubService\Model\RepoTags $repoTags = null) 
        use 
            (&$callbackCalled) {

            $this->assertNull($error);
            $callbackCalled = true;
            $numberOfTags = count($repoTags->repoTags);
            $this->assertGreaterThanOrEqual(4, $numberOfTags);
        };

        $request = $command->createRequest();
        $request->getUri();
        $command->dispatchAsync($request, $callback);

        $reactor->run();
        $this->assertTrue($callbackCalled);
    }
    
}

 