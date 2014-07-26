<?php

//use GithubService\GithubAPI\GithubAPI;
//use GithubService\GithubAPI\GithubAPIException;

use GithubService\GithubArtaxService\GithubArtaxServiceException;

require "githubBootstrap.php";

echo <<< END

<html>
<body>
<h3><a href='/'>Oauth test home</a> </h3>
<p>Checking oauth result</p>
<p>
END;

$currentOauthRequest = getSessionVariable('oauthRequest');

checkAuthResult();

echo <<< END
    </p>
    <p>
        Back to <a href='/github/index.php'>github start page</a>.
    </p>
</body>
</html>

END;


function checkAuthResult() {
    $code = getVariable('code', FALSE);
    $state = getVariable('state', FALSE);

    $provider = createProvider([], []);

    $oauthUnguessable = getSessionVariable('oauthUnguessable', null);

    if (!$code ||
        !$state ||
        !$oauthUnguessable) {
        return;
    }

    if ($state !== $oauthUnguessable) {
        //Miss-match on what we're tring to validated.
        echo "Mismatch on secret'";
        return;
    }

    try {
        $api = $provider->make('DebugGithub');//$client

        /** @var  $api DebugGithub */
        $command = $api->accessToken(
            GITHUB_CLIENT_ID,
            GITHUB_CLIENT_SECRET,
            $code,
            "http://".SERVER_HOSTNAME."/github/return.php"
        );
        
        $accessResponse = $command->execute();
        setSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, $accessResponse);

        if ($accessResponse->oauthScopes) {
            echo "You are now authed for the following scopes:<br/>";

            foreach ($accessResponse->oauthScopes as $scope) {
                echo $scope."<br/>";
            }
        }
    }
    catch(GithubArtaxServiceException $fae) {
        echo "Exception processing response: ".$fae->getMessage();
    }
}


 



 




 