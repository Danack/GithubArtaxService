<?php

use GithubService\GithubAPI\GithubAPI;
use GithubService\Model\AccessResponse;
use GithubService\Model\Commits;
use GithubService\GithubAPI\GithubAPIException;
use ArtaxServiceBuilder\Service\StoredLink;

use Artax\Request;

define('SERVER_HOSTNAME', 'localhost:8000');

$autoloader = require __DIR__.'/../../../vendor/autoload.php';

//$classDir = realpath(__DIR__)."/../../fixtures/";
$outputDirectory = realpath(__DIR__).'/../../../var/src';

//echo "realpath is ".realpath($outputDirectory);
//exit(0);

$autoloader->add('GithubService', [$outputDirectory]);
//$autoloader->add('ArtaxServiceBuilder', [realpath(__DIR__)."/"]);

require "webFunctions.php";

require "../../../../githubKey.php";

$requiredDefines = [
    'GITHUB_USER_AGENT',
    'GITHUB_CLIENT_ID',
    'GITHUB_CLIENT_SECRET',
];

foreach ($requiredDefines as $requiredDefine) {
    if (!defined($requiredDefine) ) {
        echo "$requiredDefine is not defined."; 
    }
}

define('SESSION_NAME', 'githubTest');

session_name(SESSION_NAME);
session_start();


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


function processAction(AccessResponse $accessResponse) {

    $action = getVariable('action');

    if ($action === 'delete') {

    }
//    else if ($action == 'revoke') {
//        echo "Not implemented yet";
//    }


    switch($action) {
        case('addEmail'): {
            processAddEmail($accessResponse);
            break;
        }

        case ('showMoreResults'): {
            showMoreResults($accessResponse);
            break;
        }

        case('showAddEmailForm'): {
            showAddEmailForm();
            break;
        }

        case('showAuthorizations'): {
            showAuthorizations($accessResponse);
            break;
        }

        case('showEmails'): {
            showGithubEmails($accessResponse);
            break;
        }

        case('showRepoCommits'): {
            showRepoCommits($accessResponse, 'Danack', 'Auryn');
            break;
        }

        case('showRepoTags'): {
            showRepoTags($accessResponse, 'Danack', 'Auryn');
            break;
        }

        case('showUser'): {
            showUser($accessResponse, 'Danack');


//            'X-OAuth-Scopes' => 
//        array (size=1)
//          0 => string 'user:email' (length=10)
                              
            break;
        }
    }
}



function showActionLinks() {

    $actions = [
        'showEmails' => 'Show emails',
        'showAddEmailForm' => 'Add email',
        'showRepoTags' => 'List repo tags',
        'showRepoCommits' => 'List repo commits',
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


function getAuthorisations() {
    
    //TODO - implement this

    //Check to see if there is an authorisations object in APCU
    // if so return it, otherwise

    //Get all of the authorisations.
    //Store them in APCU

    return [];
}


function processAddEmail($accessResponse) {

    $api = new GithubAPI(GITHUB_USER_AGENT);

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

function showGithubEmails(AccessResponse $accessResponse) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
    $emailCommand = $api->getUserEmails($accessResponse->accessToken);
    $emailList = $emailCommand->execute();

    foreach ($emailList->emails as $email) {
        echo "Address ".$email->address." primary = ".$email->primary."<br/>";
    }
}


function showAuthorizations(AccessResponse $accessResponse) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
    $authCommand = $api->getAuthorizations($accessResponse->accessToken);
    $authorisations = $authCommand->execute();

    foreach($authorisations->getIterator() as $authorisation) {
        echo "Application: ".$authorisation->application."<br/>";
        echo "Scopes:".implode($authorisation->scopes)."<br/>";
        echo "<br/>";
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
function showUser(AccessResponse $accessResponse, $username) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
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



function displayAndSaveLinks(\Artax\Response $response) {
    $pager = new \ArtaxServiceBuilder\Service\GithubLinkParser($response);
    $links = $pager->parseResponse();

    foreach ($links as $link) {
        $storedLink = new StoredLink($link);
        printf(
            "<a href='/github/index.php?action=showMoreResults&resultKey=%s'>%s</a><br/>",
            $storedLink->getKey(),
            $link->description
        );
    }
}

function showRepoCommits(AccessResponse $accessResponse, $username, $repo) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->listRepoCommits($accessResponse->accessToken, $username, $repo);
    $command->setAuthor('Danack');
    $commits = $command->execute();

    displayCommits($commits);
    $response = $command->getResponse();
    displayAndSaveLinks($response);
}


function showMoreResults(AccessResponse $accessResponse) {

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

    $api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->listRepoCommitsPaginate(
        $accessResponse->accessToken,
        $storedLink->link->url
    );

    $commits = $command->execute();

    displayCommits($commits);
    $response = $command->getResponse();
    displayAndSaveLinks($response);
}


function revokeAuthority(AccessResponse $accessResponse) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->revokeAllAuthority($accessResponse->accessToken, GITHUB_CLIENT_ID);
    $blah = $command->execute();
    echo "Diplomatic immunity, has been revoked?";
}


function showRepoTags(AccessResponse $accessResponse, $username, $repo) {
    $api = new GithubAPI(GITHUB_USER_AGENT);
    $command = $api->listRepoTags($accessResponse->accessToken, $username, $repo);
    $repoTags = $command->execute();
    foreach ($repoTags->getIterator() as $repoTag) {
        echo "Tag name: ".$repoTag->name." sha ".$repoTag->commitSHA."<br/>";
    }
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

 

class DebugGithub extends \GithubService\GithubAPI\GithubAPI {
    function callAPI(\Artax\Request $request, array $successStatuses = array()) {
        var_dump(toCurl($request));
        $response = parent::callAPI($request, $successStatuses);
        var_dump($response);

        return $response;
    }
}