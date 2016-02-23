<?php


namespace GithubService;

use Amp\Artax\Response;
use ArtaxServiceBuilder\Operation;
use ArtaxServiceBuilder\Service\GithubPaginator;
use GithubService\GithubArtaxService\GithubArtaxServiceException;

use GithubService\Hydrator\AppHydrator;
use GithubService\Hydrator\BlobHydrator;
use GithubService\Hydrator\BlobAfterCreateHydrator;
use GithubService\Hydrator\BranchCommitHydrator;
use GithubService\Hydrator\BranchesHydrator;
use GithubService\Hydrator\CommitHydrator;
use GithubService\Hydrator\CommitInfoHydrator;
use GithubService\Hydrator\CommitParentHydrator;
use GithubService\Hydrator\ConfigHydrator;
use GithubService\Hydrator\ContributorHydrator;
use GithubService\Hydrator\CreateDownloadHydrator;
use GithubService\Hydrator\DeploymentHydrator;
use GithubService\Hydrator\EmailSearchResultsHydrator;
use GithubService\Hydrator\EmojiListHydrator;
use GithubService\Hydrator\FileListHydrator;
use GithubService\Hydrator\GistHydrator;
use GithubService\Hydrator\GistCommentHydrator;
use GithubService\Hydrator\GistForkHydrator;
use GithubService\Hydrator\GistForksHydrator;
use GithubService\Hydrator\IndexingSuccessHydrator;
use GithubService\Hydrator\IssueCommentHydrator;
use GithubService\Hydrator\IssueEventHydrator;
use GithubService\Hydrator\LicensingHydrator;
use GithubService\Hydrator\MetaHydrator;
use GithubService\Hydrator\OauthAccessHydrator;
use GithubService\Hydrator\OauthAccessListHydrator;
use GithubService\Hydrator\PagesHydrator;
use GithubService\Hydrator\PagesBuildHydrator;
use GithubService\Hydrator\PayloadHydrator;
use GithubService\Hydrator\PersonHydrator;
use GithubService\Hydrator\PublicKeyHydrator;
use GithubService\Hydrator\PullCommentHydrator;
use GithubService\Hydrator\ReadmeContentHydrator;
use GithubService\Hydrator\RefHydrator;
use GithubService\Hydrator\RefsHydrator;
use GithubService\Hydrator\RefObjectHydrator;
use GithubService\Hydrator\RepositoriesHydrator;
use GithubService\Hydrator\RepoStatsCodeInfoHydrator;
use GithubService\Hydrator\RepoSearchItemHydrator;
use GithubService\Hydrator\RepoSearchResultsHydrator;
use GithubService\Hydrator\RepoStatsCommitActivityHydrator;
use GithubService\Hydrator\RepoStatsCommitActivityChildHydrator;
use GithubService\Hydrator\RepoStatsPunchCardHydrator;
use GithubService\Hydrator\RepoStatsPunchCardInfoHydrator;
use GithubService\Hydrator\RepoSubscriptionHydrator;
use GithubService\Hydrator\RepoStatsCodeFrequencyHydrator;
use GithubService\Hydrator\SubscriptionHydrator;
use GithubService\Hydrator\SubmoduleContentHydrator;
use GithubService\Hydrator\SimplePublicKeyHydrator;
use GithubService\Hydrator\StatusHydrator;
use GithubService\Hydrator\SymlinkContentHydrator;
use GithubService\Hydrator\TagHydrator;
use GithubService\Hydrator\TagsHydrator;
use GithubService\Hydrator\TagObjectHydrator;
use GithubService\Hydrator\TemplateHydrator;
use GithubService\Hydrator\TreeNewHydrator;
use GithubService\Hydrator\UserEmailHydrator;
use GithubService\Hydrator\UserHydrator;
use GithubService\Hydrator\UserInSearchResultHydrator;
use GithubService\Hydrator\UserSearchItemHydrator;
use GithubService\Hydrator\CommitListHydrator;

class GithubDataMapper extends DataMapper
{
    public function __construct()
    {
        $this->registerType('GithubService\Model\App', new AppHydrator());
        $this->registerType('GithubService\Model\Blob', new BlobHydrator());
        $this->registerType('GithubService\Model\BlobAfterCreate', new BlobAfterCreateHydrator());
        $this->registerType('GithubService\Model\BranchCommit', new BranchCommitHydrator());
        $this->registerType('GithubService\Model\Branches', new BranchesHydrator());
        $this->registerType('GithubService\Model\Commit', new CommitHydrator());
        $this->registerType('GithubService\Model\CommitInfo', new CommitInfoHydrator());
        $this->registerType('GithubService\Model\CommitList', new CommitListHydrator());
        $this->registerType('GithubService\Model\CommitParent', new CommitParentHydrator());
        $this->registerType('GithubService\Model\Config', new ConfigHydrator());
        $this->registerType('GithubService\Model\Contributor', new ContributorHydrator());
        $this->registerType('GithubService\Model\CreateDownload', new CreateDownloadHydrator());
        $this->registerType('GithubService\Model\Deployment', new DeploymentHydrator());
        $this->registerType('GithubService\Model\EmailSearchResults', new EmailSearchResultsHydrator());
        $this->registerType('GithubService\Model\EmojiList', new EmojiListHydrator());
        $this->registerType('GithubService\Model\FileList', new FileListHydrator());
        $this->registerType('GithubService\Model\Gist', new GistHydrator());
        $this->registerType('GithubService\Model\GistComment', new GistCommentHydrator());        
        $this->registerType('GithubService\Model\GistForks', new GistForksHydrator());
        $this->registerType('GithubService\Model\GistFork', new GistForkHydrator());
        $this->registerType('GithubService\Model\IndexingSuccess', new IndexingSuccessHydrator());
        $this->registerType('GithubService\Model\IssueComment', new IssueCommentHydrator());
        $this->registerType('GithubService\Model\IssueEvent', new IssueEventHydrator());
        $this->registerType('GithubService\Model\Licensing', new LicensingHydrator());
        $this->registerType('GithubService\Model\Meta', new MetaHydrator());
        $this->registerType('GithubService\Model\OauthAccess', new OauthAccessHydrator());
        $this->registerType('GithubService\Model\OauthAccessList', new OauthAccessListHydrator());
        $this->registerType('GithubService\Model\Pages', new PagesHydrator());
        $this->registerType('GithubService\Model\PagesBuild', new PagesBuildHydrator());
        $this->registerType('GithubService\Model\Payload', new PayloadHydrator());
        $this->registerType('GithubService\Model\Person', new PersonHydrator());
        $this->registerType('GithubService\Model\PublicKey', new PublicKeyHydrator());        
        $this->registerType('GithubService\Model\PullComment', new PullCommentHydrator());        
        $this->registerType('GithubService\Model\ReadmeContent', new ReadmeContentHydrator());
        $this->registerType('GithubService\Model\Ref', new RefHydrator());
        $this->registerType('GithubService\Model\Refs', new RefsHydrator());
        $this->registerType('GithubService\Model\RefObject', new RefObjectHydrator());
        $this->registerType('GithubService\Model\RepoSearchItem', new RepoSearchItemHydrator());
        $this->registerType('GithubService\Model\RepoSearchResults', new RepoSearchResultsHydrator());
        $this->registerType('GithubService\Model\Repositories', new RepositoriesHydrator());
        $this->registerType('GithubService\Model\RepoStatsCommitActivity', new RepoStatsCommitActivityHydrator());
        $this->registerType('GithubService\Model\RepoStatsCommitActivityChild', new RepoStatsCommitActivityChildHydrator());
        $this->registerType('GithubService\Model\RepoStatsCodeFrequency', new RepoStatsCodeFrequencyHydrator());
        $this->registerType('GithubService\Model\RepoStatsCodeInfo', new RepoStatsCodeInfoHydrator());
        $this->registerType('GithubService\Model\RepoStatsPunchCard', new RepoStatsPunchCardHydrator());
        $this->registerType('GithubService\Model\RepoStatsPunchCardInfo', new RepoStatsPunchCardInfoHydrator());
        $this->registerType('GithubService\Model\RepoSubscription', new RepoSubscriptionHydrator());
        $this->registerType('GithubService\Model\SimplePublicKey', new SimplePublicKeyHydrator());
        $this->registerType('GithubService\Model\Status', new StatusHydrator());
        $this->registerType('GithubService\Model\SubmoduleContent', new SubmoduleContentHydrator());
        $this->registerType('GithubService\Model\Subscription', new SubscriptionHydrator());
        $this->registerType('GithubService\Model\SymlinkContent', new SymlinkContentHydrator());
        $this->registerType('GithubService\Model\Tag', new TagHydrator());
        $this->registerType('GithubService\Model\Tags', new TagsHydrator());
        $this->registerType('GithubService\Model\TagObject', new TagObjectHydrator());
        $this->registerType('GithubService\Model\Template', new TemplateHydrator());
        $this->registerType('GithubService\Model\User', new UserHydrator());
        $this->registerType('GithubService\Model\UserInSearchResult', new UserInSearchResultHydrator());
        
        //Needs refactoring.
        //$this->registerType('GithubService\Model\TreeNew', new TreeNewHydrator());
        $this->registerType('GithubService\Model\UserEmail', new UserEmailHydrator());
        $this->registerType('GithubService\Model\UserSearchItem', new UserSearchItemHydrator());
    }
    
    
        /**
     * @param $response Response 
     * @param $operation Operation Unused by the Github API currently. It maybe be required for other apis
     * where some data from the request is required to interpret the resonse.
     * @return static
     * @throws \GithubService\GithubArtaxService\GithubArtaxServiceException
     */
    private function decodeJson(Response $response)
    {
        $json = $response->getBody();
        $data = json_decode($json, true);

        if ($data === null) {
            $lastJsonError = json_last_error();
            throw new GithubArtaxServiceException($response, "Error parsing json, last json error: ".$lastJsonError);
        }

        //An error is set...but presumably not an error code if we arrived here.
        if (isset($data['error']) == true) {
            $errorDescription = 'error_description not set, so cause unknown.';

            if (isset($data["error_description"]) == true) {
                $errorDescription = $data["error_description"];
            }

            throw new GithubArtaxServiceException($response, 'Github error: '.$errorDescription);
        }
        
        return $data;
    }
    
    public function createFromResponse(Response $response, Operation $operation, $class)
    {
        $data = $this->decodeJson($response);

        $instance = $this->instantiateClass($class, $data);

        //Header based information needs to be added after the array
        
        //Some of the data is embedded in a header.
        if ($response->hasHeader('X-OAuth-Scopes')) {
            $oauthHeaderValues = $response->getHeader('X-OAuth-Scopes');
            $oauthScopes = [];
            foreach ($oauthHeaderValues as $oauthHeaderValue) {
                $oauthScopes = explode(', ', $oauthHeaderValue);
            }
            $instance->oauthScopes = $oauthScopes;
        }
        
        $instance->pager = GithubPaginator::constructFromResponse($response);

        return $instance;
    }

    
}
