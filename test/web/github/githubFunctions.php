<?php

use GithubService\GithubAPI\GithubAPI;
use GithubService\Model\AccessResponse;
use GithubService\Model\Commits;
use GithubService\GithubAPI\GithubAPIException;
use ArtaxServiceBuilder\Service\StoredLink;

use Auryn\Provider;
use Artax\Request;



/**
 * @param Request $request
 * @return string
 */
function toCurl(Artax\Request $request) {
    $output = '';
    $output .= 'curl -X '.$request->getMethod()." \\\n";

    foreach ($request->getAllHeaders() as  $header => $values) {
        foreach ($values as $value) {
            $output .= "-H \"$header: $value\" \\\n";
        }
    }

    $body = $request->getBody();
    if (strlen($body)) {
        $output .= "-d '".addslashes($body)."' ";
    }

    $output .= $request->getUri();
    $output .= "\n";

    return $output;
}


/**
 *
 */
function processUnauthorizedActions() {

    $action = getVariable('action');

    switch($action) {

        case('makeOauthRequest'): {
            makeOauthRequest();
            break;
        }


        default: {
        showScopesForm();
        break;
        }
    }
}


/**
 * @param Provider $provider
 * @param AccessResponse $accessResponse
 */
function processAction(Provider $provider, AccessResponse $accessResponse) {

    $action = getVariable('action');

    if ($action === 'delete') {

    }

    switch($action) {
        case('addEmail'): {
            $provider->execute('processAddEmail');
            break;
        }

        case ('showMoreResults'): {
            $provider->execute('showMoreResults');
            break;
        }

        case('showAddEmailForm'): {
            showAddEmailForm();
            break;
        }

        case('showAuthorizations'): {
            $provider->execute('showAuthorizations');
            break;
        }

        case('showEmails'): {
            $provider->execute('showGithubEmails');
            break;
        }

        case('listRepoCommits'): {
            $provider->execute('listRepoCommits', [':username' => 'Danack', ':repo' => 'Auryn']);
            break;
        }

        case('listRepoCommitsPages'): {
            $provider->execute('listRepoCommitsPages', [':username' => 'Danack', ':repo' => 'Auryn']);
            break;
        }

        case('listRepoCommitsIterator'): {
            $provider->execute('listRepoCommitsIterator', [':username' => 'Danack', ':repo' => 'Auryn']);
            break;
        }

             
            

        case('showRepoTags'): {
            $provider->execute(
                'showRepoTags', 
                [
                    ':username' => 'Danack',
                    ':repo' => 'Auryn',
                ]
            );
            break;
        }

        case('showMultiRepoTags'): {

            $repos = [
//                "Danack/Auryn",
//                "Danack/PHP-to-Javascript",
//                "Danack/intahwebz-core",
//                "Danack/intahwebz-db",
//                "Danack/Configurator",
//                "Danack/FlickrGuzzle",
//                "Danack/HTTP2",
                "sebastianbergmann/phpunit",
            ];

            $provider->execute('showMultiRepoTags', [':repos' => $repos]);
            break;
        }

        case('showUser'): {
            $provider->execute('showUser', [':username' => 'Danack']);
            //showUser($accessResponse, 'Danack');
            break;
        }
    }
}


/**
 *
 */
function showActionLinks() {

    $actions = [
        'showEmails' => 'Show emails',
        'showAddEmailForm' => 'Add email',
        'showRepoTags' => 'List repo tags',
        'showMultiRepoTags' => 'Testing multirepo tag fetching',
        'listRepoCommits' => 'List repo commits',
        'listRepoCommitsPages' => 'List 5 pages repo commits',
        'listRepoCommitsIterator' => 'List pages with an iterator',
        'showAuthorizations' => 'Show authorizations',
        'showUser' => 'Show user',
        'delete' => 'Forget authority',
        'revoke' => 'Revoke authority',
    ];

    foreach ($actions as $action => $description) {
        printf(
            "<a href='/github/index.php?action=%s'>%s</a> ",
            $action,
            $description
        );
    }
}

/**
 * @return array
 */
function getAuthorisations() {

    //TODO - implement this

    //Check to see if there is an authorisations object in APCU
    // if so return it, otherwise

    //Get all of the authorisations.
    //Store them in APCU

    return [];
}


/**
 * @param GithubAPI $api
 * @param $accessResponse
 */
function processAddEmail(GithubAPI $api, $accessResponse) {
    $newEmail = getVariable('email');

    $emailCommand = $api->addUserEmails(
        $accessResponse->accessToken,
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
 *
 */
function showAddEmailForm() {
    $output = <<< END

    <form name='input' action='/github/index.php' method='get'>
        Add email address <br/><input type="text" size='80' name="email"/><br/>
        <input type='hidden' name='action' value='addEmail' />
        <input type="submit" value="Add"/>
    </form>
END;

    echo $output;
}

/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 */
function showGithubEmails(GithubAPI $api, AccessResponse $accessResponse) {
    //$api = new GithubAPI(GITHUB_USER_AGENT);
    $emailCommand = $api->getUserEmails($accessResponse->accessToken);
    $emailList = $emailCommand->execute();

    foreach ($emailList->emails as $email) {
        echo "Address ".$email->address." primary = ".$email->primary."<br/>";
    }
}


/**
 * @param AccessResponse $accessResponse
 */
function showAuthorizations(GithubAPI $api, AccessResponse $accessResponse) {

    try {

        echo "<p>This function is likely to fail. It appears that Github do not support it through the api with bearer tokens.</p>";

        //$api = new GithubAPI(GITHUB_USER_AGENT);
        $authCommand = $api->getAuthorizations($accessResponse->accessToken);
        $authorisations = $authCommand->execute();

        foreach ($authorisations->getIterator() as $authorisation) {
            echo "Application: ".$authorisation->application."<br/>";
            echo "Scopes:".implode($authorisation->scopes)."<br/>";
            echo "<br/>";
        }
    }
    catch (\GithubService\GithubAPI\GithubAPIException $gae) {
        echo "<p>Error in showAuthorizations: ";
        echo $gae->getMessage();
        echo "</p>";
    }
}


/**
 * @param \GithubService\Model\User $user
 */
function renderUserInfo(\GithubService\Model\User $user) {
    echo "Login: ".$user->login."<br/>";
    echo "Repos URL: ".$user->reposUrl."<br/>";
    echo "Email: ".$user->email."<br/>";
    echo "Hireable: ".$user->hireable."<br/>";
    echo "CreatedAt: ".$user->createdAt."<br/>";
    echo "Scopes: ".implode(', ', $user->oauthScopes)."<br/>";
}


/**
 * @param AccessResponse $accessResponse
 * @param $username
 */
function showUser(GithubAPI $api, AccessResponse $accessResponse, $username) {
    //$api = new GithubAPI(GITHUB_USER_AGENT);
    $authCommand = $api->getUserInfo($accessResponse->accessToken);
    $user = $authCommand->execute();
    renderUserInfo($user);
}


/**
 * @param Commits $commits
 */
function displayCommits(Commits $commits) {

    echo "<table style='font-size: 12px'>";
    echo "<tr><th>Author</th><th style='width: 500px'>Message</th><th>Date</th></tr>";

    foreach ($commits->getIterator() as $commit) {

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


/**
 * @param \Artax\Response $response
 */
function displayAndSaveLinks(\ArtaxServiceBuilder\Service\GithubPaginator $pager) {

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

/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 * @param $username
 * @param $repo
 */
function listRepoCommits(GithubAPI $api, AccessResponse $accessResponse, $username, $repo) {
    $command = $api->listRepoCommits($accessResponse->accessToken, $username, $repo);
    $command->setAuthor('Danack');
    $commits = $command->execute();

    displayCommits($commits);
    $response = $command->getResponse();

    if ($commits->pager) {
        displayAndSaveLinks($commits->pager);
    }
}



/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 * @param $username
 * @param $repo
 * @param int $pages
 */
function listRepoCommitsIterator(
    GithubAPI $api,
    AccessResponse $accessResponse,
    $username,
    $repo) 
{
    $command = $api->listRepoCommits($accessResponse->accessToken, $username, $repo);
    $command->setAuthor('Danack');
    $commitsIterator = new \GithubService\Iterator\ListRepoCommitsIterator($api, $accessResponse, $command);
    $page = 1;
    foreach ($commitsIterator as $commits) {
        echo "<h3>Page $page</h3>";
        displayCommits($commits);
        $page++;
    }
}



/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 * @param $username
 * @param $repo
 * @param int $pages
 */
function listRepoCommitsPages(
    GithubAPI $api,
    AccessResponse $accessResponse,
    $username, 
    $repo,
    $pages = 5) {
    $command = $api->listRepoCommits($accessResponse->accessToken, $username, $repo);
    $command->setAuthor('Danack');
    $commits = $command->execute();

    echo "<h3>Page 1</h3>";
    
    displayCommits($commits);
    
    $page = 1;
    
    while ($page < $pages) {
        if ($commits->pager) {
            if ($commits->pager->nextLink) {
                $command = $api->listRepoCommitsPaginate(
                    $accessResponse->accessToken,
                    $commits->pager->nextLink->url
                );

                $commits = $command->execute();
                echo "<h3>Page ".($page + 1)."</h3>";
                displayCommits($commits);
            }
        }
        $page++;
    }
}


/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 */
function showMoreResults(GithubAPI $api, AccessResponse $accessResponse) {

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
        $accessResponse->accessToken,
        $storedLink->link->url
    );

    $commits = $command->execute();

    displayCommits($commits);
    $response = $command->getResponse();

    if ($commits->pager) {
        displayAndSaveLinks($commits->pager);
    }
}


/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 */
function revokeAuthority(GithubAPI $api, AccessResponse $accessResponse) {
    //$api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->revokeAllAuthority($accessResponse->accessToken, GITHUB_CLIENT_ID);
    $blah = $command->execute();
    echo "Diplomatic immunity, has been revoked?";
}


/**
 * @param AccessResponse $accessResponse
 * @param $username
 * @param $repo
 */
function showRepoTags(GithubAPI $api, AccessResponse $accessResponse, $username, $repo) {
    //$api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->listRepoTags($accessResponse->accessToken, $username, $repo);
    $repoTags = $command->execute();
    foreach ($repoTags->getIterator() as $repoTag) {
        echo "Tag name: ".$repoTag->name." sha ".$repoTag->commitSHA."<br/>";
    }
}

/**
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 * @param $username
 * @param $reponame
 */
function showAllTagsForRepo(
    GithubAPI $api,
    AccessResponse $accessResponse,
    $username,
    $reponame,
    $maxPages = 20
) {

    $results = [];

    // What to do if an individual request in the batch fails
    $onError = function($requestKey, Exception $error) {
        echo 'Error: (', $requestKey, ') ', get_class($error).": ", $error->getMessage(), "\n";
    };

    $command = $api->listRepoTags($accessResponse->accessToken, $username, $reponame);

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
                $command = $api->listRepoTagsPaginate($accessResponse->accessToken, $uri);

                $onResponse = function ($requestKey, Artax\Response $response) use (
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
            $client = new \Artax\Client();
            $client->requestMultiVerse($requestsAndCallbacks);
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
 * @param GithubAPI $api
 * @param AccessResponse $accessResponse
 * @param $repos
 */
function showMultiRepoTags(GithubAPI $api, AccessResponse $accessResponse, $repos) {
    foreach ($repos as $repo) {
        list($username, $reponame) = explode('/', $repo);
        showAllTagsForRepo($api, $accessResponse, $username, $reponame);
    }

    return;

}


/**
 * @param $clientID
 * @param $scopes
 * @param $redirectURI
 * @param $secret
 * @return string
 */
function createAuthURL($clientID, $scopes, $redirectURI, $secret) {
    $url = "https://github.com/login/oauth/authorize";
    $url .= '?client_id='.urlencode($clientID);
    $url .= '&scope='.urlencode(implode(',', $scopes));
    $url .= '&redirect_uri='.urlencode($redirectURI);
    $url .= '&state='.urlencode($secret);

    return $url;
}

/**
 *
 */
function showScopesForm() {

    echo "<form action='/github/index.php' method='get'>";

    echo "<table width='750px'>";
    foreach (\GithubService\Github::$scopeList as $scope => $description) {

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


    echo "
        <input type='hidden' name='action' value='makeOauthRequest' />
        
    </form>";
}


/**
 *
 */
function makeOauthRequest() {
    $scopes = getVariable('scopes');
    echo "<p>Requesting scopes: ".implode(', ', $scopes).".</p>";
    showOauthRequest($scopes);
}


/**
 *
 */
function showOauthRequest($scopes) {

    $unguessable = openssl_random_pseudo_bytes(16);
    $unguessable = bin2hex($unguessable);

    $authURL = createAuthURL(
        GITHUB_CLIENT_ID,
        $scopes,
        "http://".SERVER_HOSTNAME."/github/return.php",
        $unguessable
    );
    setSessionVariable('oauthUnguessable', $unguessable);

    echo sprintf("Please click <a href='%s'>here to auth</a> with github. ", $authURL);
}


/**
 * Class DebugGithub
 */
class DebugGithub extends \GithubService\GithubAPI\GithubAPI {

    public static $count = 0;

    function callAPI(\Artax\Request $request, array $successStatuses = array()) {

        self::$count++;

        if (self::$count > 20) {
            throw new \Exception("Too many api calls in one run - did I break something?");
        }

        //echo "Calling to uri: ".$request->getUri()."<br/>";

        //var_dump(toCurl($request));
        $response = parent::callAPI($request, $successStatuses);
        //var_dump($response);

        return $response;
    }
}


function prepareArtaxClient(Artax\Client $client, Auryn\AurynInjector $provider) {
    $client->setOption('transfertimeout', 25);
}


/**
 * @param array $implementations
 * @param array $shareClasses
 * @return Provider
 */
function createProvider($implementations = array(), $shareClasses = array()) {


    $provider = new Provider();


    $provider->define(
        'GithubService\GithubAPI\GithubAPI',
        [':userAgent' => GITHUB_USER_AGENT]
    );

    $provider->prepare('Artax\Client', 'prepareArtaxClient');

    $standardImplementations = [
//        'Intahwebz\ObjectCache' => 'Intahwebz\Cache\InMemoryCache',
//        'Psr\Log\LoggerInterface' => $standardLogger
        'GithubService\GithubAPI\GithubAPI' => 'DebugGithub'
    ];

    $standardShares = [
//        'Intahwebz\Timer' => 'Intahwebz\Timer',
//        'Monolog\Logger' => $standardLogger,
    ];

    foreach ($standardImplementations as $interface => $implementation) {
        if (array_key_exists($interface, $implementations)) {
            if (is_object($implementations[$interface]) == true) {
                $provider->alias($interface, get_class($implementations[$interface]));
                $provider->share($implementations[$interface]);
            }
            else {
                $provider->alias($interface, $implementations[$interface]);
            }
            unset($implementations[$interface]);
        }
        else {
            if (is_object($implementation)) {
                $implementation = get_class($implementation);
            }
            $provider->alias($interface, $implementation);
        }
    }

    foreach ($implementations as $class => $implementation) {
        if (is_object($implementation) == true) {
            $provider->alias($class, get_class($implementation));
            $provider->share($implementation);
        }
        else {
            $provider->alias($class, $implementation);
        }
    }

    foreach ($standardShares as $class => $share) {
        if (array_key_exists($class, $shareClasses)) {
            $provider->share($shareClasses[$class]);
            unset($shareClasses[$class]);
        }
        else {
            $provider->share($share);
        }
    }

    foreach ($shareClasses as $class => $share) {
        $provider->share($share);
    }

    $provider->share($provider); //YOLO

    return $provider;
}
 