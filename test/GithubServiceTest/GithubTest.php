<?php

use GithubService\GithubArtaxService\GithubArtaxService;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use Amp\Artax\Client as ArtaxClient;
use Amp\NativeReactor;
use ArtaxServiceBuilder\BadResponseException;

include_once dirname(__DIR__)."/../../githubArtaxServiceConfig.php";

class GithubTest extends \PHPUnit_Framework_TestCase {

    private function  getReactorAndAPI() {

        $reactor = \Amp\getReactor();
        $cache = new NullResponseCache();
        $client = new ArtaxClient($reactor);
        $client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
        $client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);
        $githubAPI = new GithubArtaxService($client, $reactor, $cache, "Danack/test");
        
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
     * This cannot be a unit test. It requires getting a one time
     * password from Github and entering it.
     * @group oauth
     * @group integration
     */
    function testBasicOauth() {

//        list($reactor, $githubAPI) = $this->getReactorAndAPI();
//        /** @var  $githubAPI GithubArtaxService */
//        
//        try {
//
//            $listCommand = $githubAPI->basicListAuthorizations(
//                GITHUB_USERNAME.':'.GITHUB_PASSWORD
//            );
//
//            $listCommand->setOtp("506351");
//
//            $authorizations = $listCommand->call();
//            /** @var  $authorization \GithubService\Model\Authorization */
//            foreach ($authorizations as $authorization) {
//                echo "Name: ".$authorization->application->name."\n";
//            }
//        }
//        catch (BadResponseException $bre) {
//
//            $response = $bre->getResponse();
//            if ($response->hasHeader('X-GitHub-OTP')) {
//                $otp = $response->getHeader('X-GitHub-OTP');
//                echo "Need to do OneTimePassword:";
//                var_dump($otp);
//            }
//            
//            echo "Bad response, status: ".$bre->getResponse()->getStatus().PHP_EOL;
//            var_dump($bre->getResponse());
//        }
    }
    
    
    
//    /**
//     * @group internet
//     */
//    function testRepoTagsAsync() {
//
//        list($reactor, $githubAPI) = $this->getReactorAndAPI();
//        
//        /** @var  $githubAPI GithubArtaxService */
//        $command = $githubAPI->listRepoTags(null, "Danack", "GithubArtaxService");
//        
//        $callbackCalled = false;
//
//        $callback = function (
//            \Exception $error = null,
//            \GithubService\Model\RepoTags $repoTags = null) 
//        use 
//            (&$callbackCalled) {
//
//            $this->assertNull($error);
//            $callbackCalled = true;
//            $numberOfTags = count($repoTags->repoTags);
//            $this->assertGreaterThanOrEqual(4, $numberOfTags);
//        };
//
//        $request = $command->createRequest();
//        $request->getUri();
//        $command->dispatchAsync($request, $callback);
//
//        $reactor->run();
//        $this->assertTrue($callbackCalled);
//    }


    function testStarGazers() {

    }

//    /**
//     * Check that I haven't forgotten to add 'implements IteratorAggregate'
//     * to classes that have 'getIterator'
//     */
//    function testModelClassesThatIterate() {
//        $directoryIterator = new DirectoryIterator(__DIR__."/../../lib/GithubService/Model");
//        foreach ($directoryIterator as $fileInfo) {
//            if ($fileInfo->isDir()) {
//                continue;
//            }
//
//            $classname = $fileInfo->getBasename('.php');
//            $classReflection = new ReflectionClass('GithubService\Model\\'.$classname);
//            if ($classReflection->hasMethod('getIterator')) {
//                if ($classReflection->implementsInterface('IteratorAggregate') == false) {
//                    $this->fail("Class '$classname' is missing interface IteratorAggregate.");
//                }
//            }
//        }
//    }
}

 