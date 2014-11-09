<?php

use ArtaxServiceBuilder\Service\OauthConfig;


class GithubResponseTest extends \PHPUnit_Framework_TestCase { 

    //TODO Add checks on the data.
    public function additionProvider() {
        return array(
            ['createOauthToken.txt', 'GithubService\Model\Authorizations'],
            
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
            ['repo/listBranches.txt', 'GithubService\Model\RepoBranches'],
            ['repo/listLanguages.txt', 'GithubService\Model\Languages'],
            ['repo/listTeams.txt', 'GithubService\Model\Teams'],
            ['repo/listTags.txt', 'GithubService\Model\RepoTags'],
            ['repo/listContributors.txt', 'GithubService\Model\Contributors'],
            
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
    }
}

 