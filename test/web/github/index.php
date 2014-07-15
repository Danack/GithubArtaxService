<?php

require "githubBootstrap.php";

use GithubService\GithubAPI\GithubAPIException;

echo <<< END

<html>
<body>
<h3><a href='/'>Oauth test home</a> </h3>
END;


/** @var \GithubService\Model\AccessResponse */
$accessResponse = getSessionVariable('githubAccess');


if ($accessResponse) {
    if (!($accessResponse instanceof GithubService\Model\AccessResponse)) {
        //class was renamed...or something else bad happened.
        setSessionVariable('githubAccess', null);
        $accessResponse = null;
    }
}


//These actions need to be done before the rest of the page.
$action = getVariable('action');
switch ($action) {
    case('delete') : {
        unsetSessionVariable('githubAccess');
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
        echo "<p>You are not github authorised.</p>";
        processUnauthorizedActions();
    }
    else {
      
        echo "<p>You are github authorised.</p>";

        try {
            processAction($accessResponse);
        }
        catch(GithubAPIException $gae) {
            echo "Exception caught: ".$gae->getMessage()."<br/>";
            var_dump($gae->getResponse()->getBody());
        }
        catch(Artax\DnsException $de) {
            echo "DNS error: ".$de->getMessage()."<br/>";
        }

        showActionLinks();
    }
}
catch(GithubAPIException $gae) {
    echo "Exception caught: ".$gae->getMessage();
    var_dump($gae->getResponse()->getBody());
}
    
    
echo <<< END

</body>
</html>

END;

