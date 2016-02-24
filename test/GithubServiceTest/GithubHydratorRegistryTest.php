<?php

namespace GithugServiceTest;

use GithubService\GithubArtaxService\GithubArtaxService;
use GithubService\GithubHydratorRegistry;

/**
 * @group refactoring
 */
class GithubHydratorRegistryTest extends \PHPUnit_Framework_TestCase
{
    function testEmojis()
    {
        $dataMapper = new GithubHydratorRegistry();
        $contents = file_get_contents(__DIR__."/../fixtures/data/githubJSON/EMOJIS.json");
        $data = json_decode($contents, true);
        $emojiList = $dataMapper->instantiateClass('GithubService\Model\EmojiList', $data);
        $this->assertInstanceOf('GithubService\Model\EmojiList', $emojiList);
    }

    public function additionProvider()
    {

        return array(
//            //['ActiveAdminOrgMembership', 'ACTIVE_ADMIN_ORG_MEMBERSHIP'],
//            //['ActiveOrgMemberships', 'ACTIVE_ORG_MEMBERSHIPS '],
//            ['ActiveTeamMembership', 'ACTIVE_TEAM_MEMBERSHIP'],
            // ['AdminStats', 'ADMIN_STATS']
            ['Blob', 'BLOB'],
            ['BlobAfterCreate', 'BLOB_AFTER_CREATE'],
            //['Branch', 'BRANCH'],
            ['Branches', 'BRANCHES'],
            //['CheckMaintenanceStatus', 'CHECK_MAINTENANCE_STATUS'],
            //['CodeSearchV3Results', 'CODE_SEARCH_V3_RESULTS'],
            //['CodeSearchV3ResultsHighlighting', 'CODE_SEARCH_V3_RESULTS_HIGHLIGHTING'],
            //['CombinedStatus', 'COMBINED_STATUS'],
            //['Commit', 'COMMIT'],
            // ['CommitComment', 'COMMIT_COMMENT'],
//Difficult            ['CommitComparison', 'COMMIT_COMPARISON'],
            // ['ConfigStatuses', 'CONFIG_STATUSES'],
//Difficult            ['ContentCrud', 'CONTENT_CRUD'],
            ['Contributor', 'CONTRIBUTOR'],
            ['CreateDownload', 'CREATE_DOWNLOAD'],
            //['CreatedRelease', 'CREATED_RELEASE'],
            ['Deployment', 'DEPLOYMENT'],
            // ['DeploymentStatus', 'DEPLOYMENT_STATUS'],
// DC            ['DirectoryContent', 'DIRECTORY_CONTENT'],
            // ['Download', 'DOWNLOAD'],
            ['EmailSearchResults', 'EMAIL_SEARCH_RESULTS'],
            ['EmojiList', 'EMOJIS'],
            // ['Event', 'EVENT'],
            //['Feeds', 'FEEDS'],
//DC            ['FetchSettings', 'FETCH_SETTINGS'],
//            ['FullCommit', 'FULL_COMMIT'],
            //['FullGist', 'FULL_GIST'],
            //['FullIssue', 'FULL_ISSUE'],
            //['FullIssueEvent', 'FULL_ISSUE_EVENT'],
            //['FullOrg', 'FULL_ORG'],
            //['FullPull', 'FULL_PULL'],
            //['FullRepo', 'FULL_REPO'],
            //['FullTeam', 'FULL_TEAM'],
            //['FullUser', 'FULL_USER'],
            // ['GetAuthorizedSshKeys', 'GET_AUTHORIZED_SSH_KEYS'],
            ['Gist', 'GIST'],
            ['GistComment', 'GIST_COMMENT'],
            ['GistForks', 'GIST_FORKS'],
            // ['GistHistory', 'GIST_HISTORY'],
            //['GitCommit', 'GIT_COMMIT'],
            // ['Gittag', 'GITTAG'],
            //['Hook', 'HOOK'],
            ['IndexingSuccess', 'INDEXING_SUCCESS'],
            ['IssueComment', 'ISSUE_COMMENT'],
            ['IssueEvent', 'ISSUE_EVENT'],
            //['IssueSearchItem', 'ISSUE_SEARCH_ITEM'],
//       TODO - only implement v3?     ['IssueSearchResults', 'ISSUE_SEARCH_RESULTS'],
            ['Licensing', 'LICENSING'],
            ['Meta', 'META'],
            ['OauthAccess', 'OAUTH_ACCESS'],
            //['OauthAccessWithUser', 'OAUTH_ACCESS_WITH_USER'],
//            ['OrgMemberships', 'ORG_MEMBERSHIPS'],
            ['Pages', 'PAGES'],
            ['PagesBuild', 'PAGES_BUILD'],
//            ['PendingOrgMemberships', 'PENDING_ORG_MEMBERSHIPS'],
//DC            ['PrivateOrg', 'PRIVATE_ORG'],
            //['PrivateUser', 'PRIVATE_USER'],
            ['PublicKey', 'PUBLIC_KEY'],
            //['Pull', 'PULL'],
            ['PullComment', 'PULL_COMMENT'],
            ['ReadmeContent', 'README_CONTENT'],
            ['Ref', 'REF'],
            ['Refs', 'REFS'],
            ['RepoSearchItem', 'REPO_SEARCH_ITEM'],
            ['RepoSearchResults', 'REPO_SEARCH_RESULTS'],
            ['RepoStatsCodeFrequency', 'REPO_STATS_CODE_FREQUENCY'],
            ['RepoStatsCommitActivity', 'REPO_STATS_COMMIT_ACTIVITY'],
//DC             ['RepoStatsContributors', 'REPO_STATS_CONTRIBUTORS'],
            // ['RepoStatsParticipation', 'REPO_STATS_PARTICIPATION'],
            ['RepoStatsPunchCard', 'REPO_STATS_PUNCH_CARD'],
            ['RepoSubscription', 'REPO_SUBSCRIPTION'],
            ['SimplePublicKey', 'SIMPLE_PUBLIC_KEY'],
            ['Status', 'STATUS'],
            ['SubmoduleContent', 'SUBMODULE_CONTENT'],
            ['Subscription', 'SUBSCRIPTION'],
            ['SymlinkContent', 'SYMLINK_CONTENT'],
            ['Tag', 'TAG'],
            //['Team', 'TEAM'],
            ['Template', 'TEMPLATE'],
            //['Thread', 'THREAD'],
            //['Tree', 'TREE'],
            //['TreeNew', 'TREE_NEW'],
            ['UserEmail', 'USER_EMAIL'],
            ['UserSearchItem', 'USER_SEARCH_ITEM'],
            //['UserSearchResults', 'USER_SEARCH_RESULTS'], Need to check what is current version
        );
    }

    /**
     * @dataProvider additionProvider
     */
    function testDataParsing($expectedClassname, $dataFile)
    {
        $json = file_get_contents(__DIR__.'/../fixtures/data/githubJSON/'.$dataFile.'.json');
        $className = 'GithubService\Model\\'.$expectedClassname;
        $data = json_decode($json, true);
        $dataMapper = new GithubHydratorRegistry();

        $instance = $dataMapper->instantiateClass($className, $data);
        $this->assertInstanceOf(
            $className,
            $instance
        );
    }
}
