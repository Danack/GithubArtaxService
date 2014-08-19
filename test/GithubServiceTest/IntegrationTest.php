<?php

use GithubService\GithubArtaxService\GithubArtaxService;


class IntegrationTest extends \PHPUnit_Framework_TestCase {

    function testGoogle() {
        $client = new \Artax\Client();
        $future = $client->request("http://www.google.com");
        /** @var $result After\Future */
        $response = $future->wait();
        $this->assertEquals(200, $response->getStatus());
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
        
        $callback = function($error, GithubService\Model\RepoTags $repoTags) use (&$errorExternal, &$repoTagsExternal) {
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