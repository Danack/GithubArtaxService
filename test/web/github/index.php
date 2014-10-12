<?php

require "githubBootstrap.php";

use \GithubService\GithubArtaxService\GithubArtaxServiceException;

echo <<< END
<html>
<body>
<h3><a href='/'>Oauth test home</a> </h3>
END;


/** @var  $accessResponse \GithubService\Model\AccessResponse */
$accessResponse = getSessionVariable(GITHUB_ACCESS_RESPONSE_KEY);



if ($accessResponse) {
    if (!($accessResponse instanceof GithubService\Model\AccessResponse)) {
        //class was renamed...or something else bad happened.
        setSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, null);
        $accessResponse = null;
    }
}

$shareClasses = [];

if ($accessResponse) {
    $shareClasses['GithubService\Model\AccessResponse'] = $accessResponse;
}


$provider = createProvider(
    [],
    $shareClasses
);


//These actions need to be done before the rest of the page.
$action = getVariable('action');
switch ($action) {
    case('delete') : {
        unsetSessionVariable(GITHUB_ACCESS_RESPONSE_KEY);
        $accessResponse = null;
        break;
    }
    case('revoke') : {
        revokeAuthority($accessResponse);
        break;
    }
}


try {
    if ($accessResponse == null) {
        echo "<p>You are not github authorised. Please choose the permissions you want to test with:</p>";
        processUnauthorizedActions();
    }
    else {
        echo "<p>You are github authorised.</p>";
        try {
            processAction($provider, $accessResponse);
        }
        catch(GithubArtaxServiceException $gae) {
            echo "Exception caught: ".$gae->getMessage()."<br/>";
            var_dump($gae->getResponse()->getBody());
        }
        catch(Artax\DnsException $de) {
            echo "DNS error: ".$de->getMessage()."<br/>";
        }

        showActionLinks();
    }
}
catch(GithubArtaxServiceException $gae) {
    echo "Exception caught: ".$gae->getMessage();
    var_dump($gae->getResponse()->getBody());
}
    
    
echo <<< END

</body>
</html>

END;

