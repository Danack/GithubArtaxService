<?php

namespace GithubExample;

use Jig\Plugin;
use Jig\Plugin\BasicPlugin;
use GithubService\Model\CommitList;
use GithubExample\Context\ListRepoCommitsByPage;
use GithubService\GithubArtaxService\GithubService; 

use GithubService\Model\UserEmail;
use GithubService\Model\UserEmailList;
use GithubService\Model\User;
use GithubExample\Context\OauthContext;
use GithubExample\Route;

class GithubPlugin extends BasicPlugin
{

    /**
     * Return the list of functions provided by this plugin.
     * @return string[]
     */
    public static function getFunctionList()
    {
        $parentFunctions = parent::getFunctionList();
        $functions = [
            'displayCommits',
            'renderUserInfo',
            'renderListRepoCommitsByPage',
            'showActionLinks',
            'showAddEmailForm',
            'showScopesForm',
            'renderUserEmails',
            'renderAuthStatus',
        ];

        return array_merge($parentFunctions, $functions);
    }

    public function renderListRepoCommitsByPage(ListRepoCommitsByPage $listRepoCommitsByPage)
    {
        foreach ($listRepoCommitsByPage->pagedCommits as $page => $commits) {
            echo "<h3>Page $page</h3>";
            foreach ($commits->commitsChild as $commitChild) {
                /** @var $commitChild \GithubService\Model\Commit */
                echo "sha:".$commitChild->sha;
                echo "message :".$commitChild->commitInfo->message;
                echo "<br/>";
            }
        }
    }


    /**
     *
     */
    public function showScopesForm()
    {
        echo "<form action='".Route::oauthConfirm()."' method='get'>";
        echo "<table width='750px'>";
        foreach (GithubService::$scopeDescriptions as $scope => $description) {
            echo "<tr>";
            echo "<td valign='top'>";
            echo "<input type='checkbox' name='scopes[]' value='$scope'/>";
            echo "</td>";

            echo "<td valign='top'>";
            echo "$scope";
            echo "</td>";

            echo "<td valign='top'>";
            echo $description;
            echo "</td>";

            echo "</tr>";
        }

        echo "<tr>";
        echo "<td valign='top' colspan='2' align='right'>";
        echo "</td><td>";
        echo "<input type='submit' value='Make auth request'/>";
        echo "</td>";
        echo "</tr>";

        echo "</table>";

        echo "</form>";
    }


    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     * @param $username
     * @param $reponame
     */
    function showAllTagsForRepo(
        GithubService $api,
        AccessResponse $accessResponse,
        $username,
        $reponame,
        $maxPages = 20
    )
    {

        $results = [];


        echo "Sorry, this needs updating. <br/>";
        return;


        // What to do if an individual request in the batch fails
        $onError = function ($requestKey, Exception $error) {
            echo 'Error: (', $requestKey, ') ', get_class($error).": ", $error->getMessage(), "\n";
        };

        $command = $api->listRepoTags(new Oauth2Token($accessResponse->accessToken), $username, $reponame);

        $repoTags = $command->execute();
        $results[] = $repoTags;
        $pages = [];


        if ($repoTags->pager) {
            $newPages = $repoTags->pager->getAllKnownPages();
            foreach ($newPages as $newPage) {
                $pages[$newPage] = false;
            }
        }


        $finished = false;

        $count = 0;

        while ($finished == false) {

            $maxPages++;

            //TODO - this is in the wrong place, it's currently max iterations.
            if ($count > $maxPages) {
                break;
            }

            $requestsAndCallbacks = [];

            foreach ($pages as $uri => $alreadyFetched) {
                if ($alreadyFetched == false) {
                    $pages[$uri] = true;
                    $command = $api->listRepoTagsPaginate(
                        new Oauth2Token(new Oauth2Token($accessResponse->accessToken)),
                        $uri
                    );

                    $onResponse = function ($requestKey, Response $response) use (
                        $command,
                        &$pages,
                        &$results
                    ) {
                        $newRepoTags = $command->processResponse($response);
                        $results[] = $newRepoTags;
                        if ($newRepoTags->pager) {
                            $newPages = $newRepoTags->pager->getAllKnownPages();

                            foreach ($newPages as $newPage) {
                                if (isset($pages[$newPage]) == false) {
                                    $pages[$newPage] = false;
                                }
                            }
                        }
                    };

                    $requestsAndCallbacks[] = [
                        $command->createRequest(),
                        $onResponse,
                        $onError
                    ];

                }
            }

            if (count($requestsAndCallbacks)) {
                $client = new ArtaxClient();
                //$client->requestMultiVerse($requestsAndCallbacks);
                //$client->requestMulti($requestsAndCallbacks);


            }
            else {
                $finished = true;
            }
        }

        $mergedRepoTags = [];
        foreach ($results as $result) {
            foreach ($result->repoTags as $repoTag) {
                $mergedRepoTags[$repoTag->name] = $repoTag;
            }
        }
        return $mergedRepoTags;
    }

    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     * @param $repos
     */
    public function showMultiRepoTags(GithubService $api, AccessResponse $accessResponse, $repos)
    {
        foreach ($repos as $repo) {
            list($username, $reponame) = explode('/', $repo);
            showAllTagsForRepo($api, $accessResponse, $username, $reponame);
        }

        return;
    }


    /**
     * @param CommitList $commits
     */
    public function displayCommits(CommitList $commits)
    {
        echo "<table style='font-size: 12px'>";
        echo "<tr><th>Author</th><th style='width: 500px'>Message</th><th>Date</th></tr>";

        foreach ($commits as $commit) {

            echo "<tr><td>";
            if ($commit->author) {
                printf(
                    "<a href='%s'>%s</a>",
                    $commit->author->url,
                    $commit->author->login
                );
            }
            else {
                echo "Unknown";
            }
            echo "</td><td style='width: 500px'>";
            echo $commit->commitInfo->message;
            echo "</td><td>";
            echo $commit->commitInfo->committerDate;
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }


    public function displayAndSaveLinks(\ArtaxServiceBuilder\Service\GithubPaginator $pager)
    {
        $links = $pager->getLinks();

        foreach ($links as $link) {
            $storedLink = new StoredLink($link);
            printf(
                "<a href='/github/index.php?action=showMoreResults&resultKey=%s'>%s</a><br/>",
                $storedLink->getKey(),
                $link->description
            );
        }
    }


    public function showAuthorizations(GithubService $api, AccessResponse $accessResponse)
    {

        try {

            echo "<p>This function is likely to fail. It appears that Github do not support it through the api with bearer tokens.</p>";

            //$api = new GithubAPI(GITHUB_USER_AGENT);
            $authCommand = $api->getAuthorizations(new Oauth2Token($accessResponse->accessToken));
            $authorisations = $authCommand->execute();

            foreach ($authorisations->getIterator() as $authorisation) {
                echo "Application: ".$authorisation->application."<br/>";
                echo "Scopes:".implode($authorisation->scopes)."<br/>";
                echo "<br/>";
            }
        }
        catch (\GithubService\GithubArtaxService\GithubArtaxServiceException $gae) {
            echo "<p>Error in showAuthorizations: ";
            echo $gae->getMessage();
            echo "</p>";
        }
    }

    /**
     * @param \GithubService\Model\User $user
     */
    public function renderUserInfo(User $user)
    {
        echo "Login: ".$user->login."<br/>";
        echo "Repos URL: ".$user->reposUrl."<br/>";
        echo "Avatar URL: ".$user->avatarUrl."<br/>";
        echo "Starred URL: ".$user->starredUrl."<br/>";
    }


    public function showActionLinks(OauthContext $oauthContext)
    {
        $actions = [
            'showRepoTags' => 'List repo tags',
            'showMultiRepoTags' => 'Testing multirepo tag fetching',
            'listRepoCommits' => 'List repo commits',
            'listRepoCommitsPages' => 'List 5 pages repo commits',
            'listRepoCommitsIterator' => 'List pages with an iterator',
        ];

        $unauthedActions = [
            'oauth/start' => 'Get authenticated'
        ];

        $authedActions = [
            'showEmails' => 'Show emails',
            'showAddEmailForm' => 'Add email',
            'forget' => 'Forget authority',
            'revoke' => 'Revoke authority',
            'showUser' => 'Show user',
            'showAuthorizations' => 'Show authorizations',
        ];
        
        if ($oauthContext->isAuthenticated) {
            $actions = array_merge($actions, $authedActions);
        }
        else {
            $actions = array_merge($actions, $unauthedActions);
        }

        echo "<ul class='nav'>";
        foreach ($actions as $action => $description) {
            printf(
                "<li><a href='/%s'>%s</a></li>",
                $action,
                $description
            );
        }
        echo "</ul>";
    }


    public function showAddEmailForm()
    {
        $output = <<< END
    
        <form name='input' action='/github/index.php' method='get'>
            Add email address <br/><input type="text" size='80' name="email"/><br/>
            <input type='hidden' name='action' value='addEmail' />
            <input type="submit" value="Add"/>
        </form>
END;

        echo $output;
    }

    public function renderAuthStatus(OauthContext $oauthContext)
    {
        if ($oauthContext->isAuthenticated == true) {
            echo "You are authenticated.";
        }
        else {
            echo "You are NOT authenticated.";
        }
    }
    
    
    public function renderUserEmails(UserEmailList $userEmailList)
    {
        foreach ($userEmailList->emails as $email) {
            printf(
                "Email: %s verified: %s, primary %s",
                $email->email,
                $email->verified,
                $email->primary
            );
        }
    }
}
