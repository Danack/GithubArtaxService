<?php

namespace GithubExample\Controller;

use ArtaxServiceBuilder\Service\StoredLink;
use ASM\Session;
use GithubExample\Context\StartOauthRequest;
use GithubService\AuthToken;
use GithubService\AuthToken\NullToken;
use GithubService\AuthToken\Oauth2Token;
use GithubService\CurlDebug;
use GithubService\GithubArtaxService\GithubService;
use Room11\HTTP\Body\TextBody;
use Room11\HTTP\VariableMap;
use Tier\Bridge\JigExecutable;
use Tier\InjectionParams;
use GithubService\GithubArtaxService\GithubArtaxServiceException;
use GithubExample\Context\OauthErrorContext;
use GithubExample\Context\OauthSuccessContext;
use GithubExample\Context\ShowUserContext;
use GithubExample\Context\ShowRepoTagsContext;
use GithubExample\Context\ShowUserEmailsContext;
use GithubExample\SessionBasedOauth;



class Controller
{
    public function index()
    {
        return JigExecutable::create("pages/index");
    }
    
    public function debug(Session $session, AuthToken $token)
    {
        $text = "";
        $text .= "StdClass ".var_export($session->getSessionVariable('testing session stuff'), true);
        $text .= "\n";
        
        $text .= "Token is: ".$token->getToken()."\n";

        $stdClass = new \StdClass;
        $stdClass->random = rand(1000, 5000);
        $session->setSessionVariable('testing session stuff', $stdClass);

        return new TextBody($text);
    }

    public function oauthStart()
    {
        return JigExecutable::create("pages/oauth/start");
    }
    
    public function oauthConfirm(
        VariableMap $variableMap,
        Session $session
    ) {
        $scopes = $variableMap->getVariable('scopes', []);
        $unguessable = openssl_random_pseudo_bytes(16);
        $unguessable = bin2hex($unguessable);
        $session->setSessionVariable('oauthUnguessable', $unguessable);

        $authURL = GithubService::createAuthURL(
            GITHUB_CLIENT_ID,
            $scopes,
            "http://".SERVER_HOSTNAME."/oauth/return",
            $unguessable
        );
        
        $context = StartOauthRequest::create($scopes, $authURL);

        return JigExecutable::createWithSharedObjects("pages/oauth/confirm", [$context]);
    }
    
    public function oauthReturn(
        GithubService $api,
        VariableMap $variableMap,
        Session $session,
        SessionBasedOauth $sessionBasedOauth
    ) {
        $code = $variableMap->getVariable('code', false);
        $state = $variableMap->getVariable('state', false);
        $oauthUnguessable = $session->getSessionVariable('oauthUnguessable', null);

        if (!$code ||
            !$state ||
            !$oauthUnguessable
        ) {
            $errorContext = OauthErrorContext::create("Missing data: '$code' '$state' '$oauthUnguessable'");
            return JigExecutable::createWithSharedObjects("pages/oauth/error", [$errorContext]);
        }

        if ($state !== $oauthUnguessable) {
            //Miss-match on what we're tring to validated.
            $errorContext = OauthErrorContext::create("Mismatch on secret'");
            return JigExecutable::createWithSharedObjects("pages/oauth/error", [$errorContext]);
        }

        try {
            $oauthOperation = $api->getOauthAuthorization(
                GITHUB_CLIENT_ID,
                GITHUB_CLIENT_SECRET,
                $code,
                $oauthUnguessable
            );

            $oauthOperation->setRedirect_uri("http://".SERVER_HOSTNAME."/oauthReturn");
            $accessResponse = $oauthOperation->execute();
            $session->setSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, $accessResponse);

            $authToken = new Oauth2Token($accessResponse->accessToken);
            $sessionBasedOauth->save($authToken);
            $oauthSuccessContext = OauthSuccessContext::create($accessResponse);

            return JigExecutable::createWithSharedObjects("pages/oauth/success", [$oauthSuccessContext]);
        }
        catch(GithubArtaxServiceException $fae) {
            $errorContext = OauthErrorContext::create($fae->getMessage());
            return JigExecutable::createWithSharedObjects("pages/oauth/error", [$errorContext]);
        }
    }

    public function showEmails(
        GithubService $api,
        AuthToken $authToken
    ) {
        $userEmailsOperation = $api->listUserEmails($authToken);
        $userEmails = $userEmailsOperation->execute();
        $showUserEmailsContext = ShowUserEmailsContext::fromUserEmails($userEmails);
        
        return JigExecutable::createWithSharedObjects("pages/showEmails", [$showUserEmailsContext]);
    }
    
    public function showAddEmailForm()
    {
        return JigExecutable::create("pages/index");
    }

    public function showMultiRepoTags()
    {
        return JigExecutable::create("pages/index");
    }

    public function showAuthorizations()
    {
        return JigExecutable::create("pages/index");
    }

    public function forget(SessionBasedOauth $sessionBasedOauth)
    {
        $sessionBasedOauth->forget();
        return JigExecutable::create("pages/index");
    }

    public function revoke()
    {
        return JigExecutable::create("pages/index");
    }

    /**
     * @return array
     */
    function getAuthorisations()
    {
        return [];
    }

    public function showUser(GithubService $api, AuthToken $authToken)
    {
        $username = 'Danack';
        $getUserOperation = $api->getUser($authToken, $username);
        $user = $getUserOperation->execute();
        $showUserContext = ShowUserContext::fromUser($user);

        return JigExecutable::createWithSharedObjects("pages/showUser", [$showUserContext]);
    }


    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     */
    function revokeAuthority(GithubService $api, AuthToken $authToken)
    {
        $command = $api->revokeAllAuthority($accessResponse->accessToken, GITHUB_CLIENT_ID);
        $blah = $command->execute();
        echo "Diplomatic immunity, has been revoked?";
    }


    function showRepoTags(GithubService $api, AuthToken $authToken)
    {
        $username = 'Danack';
        $repo = 'GithubArtaxService';
    
        $command = $api->listRepoTags($authToken, $username, $repo);
        $command->setPerPage(100);
        $repoTags = $command->execute();        
        $repoTagsContext = ShowRepoTagsContext::fromTags($repoTags);

        return JigExecutable::createWithSharedObjects("pages/showRepoTags", [$repoTagsContext]);
    }


    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     */
    function showMoreResults(GithubService $api, AccessResponse $accessResponse)
    {

        $resultKey = getVariable('resultKey');

        if (!$resultKey) {
            echo "Couldn't read resultKey, can't show more results.";
            return;
        }

        $storedLink = StoredLink::createFromKey($resultKey);
        if (!$storedLink) {
            echo "Couldn't find storedLink from key $resultKey, can't show more results.";
            return;
        }

        $command = $api->listRepoCommitsPaginate(
            new Oauth2Token($accessResponse->accessToken),
            $storedLink->link->url
        );

        $commits = $command->execute();

        displayCommits($commits);
        //$response = $command->getResponse();

        if ($commits->pager) {
            displayAndSaveLinks($commits->pager);
        }
    }


    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     * @param $username
     * @param $repo
     * @param int $pages
     */
    function listRepoCommitsPages(
        GithubService $api,
        AccessResponse $accessResponse,
        $username,
        $repo,
        $pages = 5)
    {
        $command = $api->listRepoCommits(new Oauth2Token($accessResponse->accessToken), $username, $repo);
        $command->setAuthor('Danack');
        $commits = $command->execute();

        echo "<h3>Page 1</h3>";

        displayCommits($commits);

        $page = 1;

        while ($page < $pages) {
            if ($commits->pager) {
                if ($commits->pager->nextLink) {
                    $command = $api->listRepoCommitsPaginate(
                        new Oauth2Token($accessResponse->accessToken),
                        $commits->pager->nextLink->url
                    );

                    $commits = $command->execute();
                    echo "<h3>Page ".($page + 1)."</h3>";
                    displayCommits($commits);
                }
            }
            $page++;
        }
        
        return JigExecutable::create("pages/index");
    }


    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     * @param $username
     * @param $repo
     */
    function listRepoCommits(GithubService $api)
    {
        
        //AccessResponse $accessResponse,
        $username = "Danack";
        $repo = "GithubArtaxService";
        
        //$command = $api->listRepoCommits(new Oauth2Token($accessResponse->accessToken), $username, $repo);
        $command = $api->listRepoCommits(new NullToken(), $username, $repo);
        
        //$command->setAuthor('Danack');
        $commits = $command->execute();
        

        $injectionParams = InjectionParams::fromShareObjects([$commits]);
        return JigExecutable::create("pages/listRepoCommits", $injectionParams);
        
//        if ($commits->pager) {
//            displayAndSaveLinks($commits->pager);
//        }
    }


 
    function listRepoCommitsIterator(
        GithubService $api,
        AuthToken $oauth2Token
    ) {
        $username = "Danack"; 
        $repo = "GithubArtaxService";
        
        $listRepoCommits = $api->listRepoCommits($oauth2Token, $username, $repo);        
        $command = $api->listRepoCommits($oauth2Token, $username, $repo);
        $command->setAuthor('Danack');
        $commitsIterator = new \GithubService\Iterator\ListRepoCommitsIterator(
            $api,
            $oauth2Token,
            $listRepoCommits
        );

        $context = new \GithubExample\Context\ListRepoCommitsByPage();
        
        $page = 1;
        foreach ($commitsIterator as $commits) {
            $context->addCommits($page, $commits);
            $page++;
        }

        return JigExecutable::createWithSharedObjects("pages/listRepoCommitsIterator", [$context]);
    }

    /**
     * @param GithubService $api
     * @param AccessResponse $accessResponse
     */
    function showGithubEmails(GithubService $api, AccessResponse $accessResponse)
    {
        $emailCommand = $api->getUserEmails(
            new Oauth2Token($accessResponse->accessToken)
        );
        $emailList = $emailCommand->execute();

        foreach ($emailList->emails as $email) {
            echo "Address ".$email->address." primary = ".$email->primary."<br/>";
        }
    }


    /**
     * @param GithubService $api
     * @param $accessResponse
     */
    function processAddEmail(GithubService $api, $accessResponse)
    {
        $newEmail = getVariable('email');

        $emailCommand = $api->addUserEmails(
            new Oauth2Token($accessResponse->accessToken),
            [$newEmail]
        );

        $allowedScopes = getAuthorisations();

        if (false) {
            //This isn't working yet.
            $emailCommand->checkScopeRequirement($allowedScopes);
        }

        $emailCommand->execute();
        $request = $emailCommand->createRequest();
        $request->setBody(json_encode([$newEmail]));
        $response = $emailCommand->dispatch($request);
    }

    /**
     * @param $clientID
     * @param $scopes
     * @param $redirectURI
     * @param $secret
     * @return string
     */
    function createAuthURL($clientID, $scopes, $redirectURI, $secret)
    {
        $url = "https://github.com/login/oauth/authorize";
        $url .= '?client_id='.urlencode($clientID);
        $url .= '&scope='.urlencode(implode(',', $scopes));
        $url .= '&redirect_uri='.urlencode($redirectURI);
        $url .= '&state='.urlencode($secret);

        return $url;
    }


}