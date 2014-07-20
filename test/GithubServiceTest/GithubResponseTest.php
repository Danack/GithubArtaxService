<?php

use ArtaxServiceBuilder\Service\OauthConfig;


class GithubResponseTest extends \PHPUnit_Framework_TestCase { 

    //TODO Add checks on the data.
    public function additionProvider() {
        return array(
            ['getSingleCommit.txt', 'GithubService\Model\Commit'],
            ['getSingleUser.txt', 'GithubService\Model\User'],
            ['listCommitsOnARepository.txt', 'GithubService\Model\Commits'],
            ['listCommits.txt', 'GithubService\Model\Commits'],
            ['listEmailAddressesForUser.txt', 'GithubService\Model\Emails'],
            ['addEmailAddresses.txt', 'GithubService\Model\Emails'],
            ['listRepoTags.txt', 'GithubService\Model\RepoTags'],
            ['listAuthorizations.txt', 'GithubService\Model\Authorizations'],

            //Repos
            ['repo/getBranch.txt', 'GithubService\Model\RepoBranch'], 
            
            
            
        );
    }

    /**
     * @dataProvider additionProvider
     */
    function testDataParsing($dataFile, $expectedClassname) {
        $json = file_get_contents(__DIR__.'/../fixtures/data/github/'.$dataFile);
        
        $instance = $expectedClassname::createFromJson($json);
        $this->assertInstanceOf(
            $expectedClassname,
            $instance
        );
        
        if ($instance instanceof GithubService\Model\RepoBranch) {
            var_dump($instance->links);
        }
    }
}

 