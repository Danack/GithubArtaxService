<?php

use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use Amp\NativeReactor;
use ArtaxServiceBuilder\BadResponseException;

include_once dirname(__DIR__)."/../../githubArtaxServiceConfig.php";

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
     * @group oauth
     * @group integration
     */
    function testBasicOauth() {

        list($reactor, $githubAPI) = $this->getReactorAndAPI();
        /** @var  $githubAPI GithubArtaxService */
        
        try {

            $listCommand = $githubAPI->basicListAuthorizations(
                GITHUB_USERNAME.':'.GITHUB_PASSWORD
            );

            $listCommand->setOtp("506351");

            $authorizations = $listCommand->call();
            /** @var  $authorization \GithubService\Model\Authorization */
            foreach ($authorizations as $authorization) {
                echo "Name: ".$authorization->application->name."\n";
            }
        }
        catch (BadResponseException $bre) {

            $response = $bre->getResponse();
            if ($response->hasHeader('X-GitHub-OTP')) {
                $otp = $response->getHeader('X-GitHub-OTP');
                echo "Need to do OneTimePassword:";
                var_dump($otp);
            }
            
            echo "Bad response, status: ".$bre->getResponse()->getStatus().PHP_EOL;
            var_dump($bre->getResponse());
        }
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

 