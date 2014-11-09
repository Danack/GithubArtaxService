<?php

use GithubService\GithubArtaxService\GithubArtaxService;

use Amp\Artax\Client as ArtaxClient;

use Amp\Artax\Response;


/**
 * Class IntegrationTest
 * @group integration
 */
class IntegrationTest extends \PHPUnit_Framework_TestCase {

    function testGoogle() {
        $client = new ArtaxClient();
        $future = $client->request("http://www.google.com");
        $response = $future->wait();
        /** @var $response Response */
        $this->assertEquals(200, $response->getStatus());
    }

    function testError() {
        $this->setExpectedException('Amp\Dns\ResolutionException');
        $client = new ArtaxClient();
        $client->setOption(ArtaxClient::OP_HOST_CONNECTION_LIMIT, 3);
        $future = $client->request("http://doesntexist.test");
        $future->wait();
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

        $errorExternal = null;

        /** @var  $repoTagsExternal \GithubService\Model\RepoTags */
        $repoTagsExternal = null;
        
        $callback = function(\Exception $error = null, GithubService\Model\RepoTags $repoTags = null) use (&$errorExternal, &$repoTagsExternal) {
            $errorExternal = $error;
            $repoTagsExternal = $repoTags;
        };

        /** @var $githubArtaxService GithubArtaxService */
        $promise = $githubArtaxService->listRepoTags(null, 'Danack', 'GithubArtaxService')->executeAsync($callback);

        $promise->wait();

        $this->assertNull($errorExternal, "Unexpected error ".var_export($errorExternal, true));
        $this->assertInstanceOf('GithubService\Model\RepoTags', $repoTagsExternal);
        $this->assertTrue(is_array($repoTagsExternal->repoTags), "repo tags is meant to be an array");
        //This could break if we ever delete tags.
        $this->assertGreaterThanOrEqual(3, count($repoTagsExternal->repoTags));
    }
}