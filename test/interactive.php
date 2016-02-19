<?php

use Auryn\Provider;
use GithubService\GithubService;
use ArtaxServiceBuilder\BasicAuthToken;

use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;
use ArtaxServiceBuilder\Oauth2Token;
use ArtaxServiceBuilder\BadResponseException;
use GithubService\Model\DataMapperException;


require_once dirname(dirname(__DIR__))."/clavis.php";
$autoloader = require dirname(__DIR__).'/vendor/autoload.php';
require_once "testBootstrap.php";

/**
 * This test cannot be run automatically. It requires the user to read
 * the one-time-password sent to their phone.
 */


/** @var  $injector Provider */
$injector = createProvider();

/** @var $githubService GithubService */
$githubService = $injector->make('GithubService\GithubArtaxService\GithubService');

try {

    $token = @file_get_contents("../../GithubToken.txt");
    if ($token === false) {
        $token = getToken($githubService);
        file_put_contents("../../GithubToken.txt", $token);
        echo "wrote token to file\n";
    }
}
catch (BadResponseException $bre) {
    echo "Bad response, body is:";
    
    echo $bre->getResponse()->getBody();
}
catch (DataMapperException $dme) {
    echo $dme->displayProblem();
}
    

//try {
//    $oauthToken = new Oauth2Token($token);
//    $q = 'Resource language:php extension:php user:Danack';
//    $search = $githubService->searchCode($oauthToken, $q);
//    $searchResult = $search->execute();
//    echo "Number of items = ".$searchResult->items."\n";
//}
//catch (DataMapperException $dme) {
//    $dme->displayProblem();
//}
//catch (BadResponseException $bre) {
//    echo "Bad status: ".$bre->getResponse()->getStatus()."\n";
//    echo "Body is: ".$bre->getResponse()->getBody()."\n";
//
//    echo "Original request was to: ".$bre->getResponse()->getOriginalRequest()->getUri()."\n";
//}

echo "Complete.".PHP_EOL;

function getToken(GithubService $githubService) {
    echo "Enter username:\n";
    $username = trim(fgets(STDIN));

    echo "Enter password:\n";
    $password = trim(fgets(STDIN));

    $otp = false;
    $token = false;

    $basicToken = new BasicAuthToken($username, $password);

    $applicationName = 'BastionInteractiveTest';

    $token = null;

    if ($token) {
        echo "Yay we stored token\n";
        exit(0);
    }

    for ($i = 0; $i < 5 && ($token == false); $i++) {

        try {
            //$currentAuthCommand = $githubService->getAuthorizations($basicToken);
            $authCommand = $githubService->createAuthorization(
                $basicToken->__toString(),
                [],
                $applicationName.'_'.date('YmdHis')
            //'https://www.bastionrpm.com'
//                GITHUB_CLIENT_ID,
//                GITHUB_CLIENT_SECRET
            );

            if ($otp) {
                $authCommand->setOtp($otp);
            }
            $authResult = $authCommand->execute();


            $response = $authCommand->getResponse();

            echo "Response was: ";
            var_dump($response->getBody());
//            $authCommand = $githubService->getOrCreateAuthorization(
//                $basicToken->__toString(),
//                [],
//                $applicationName,
//                'https://www.bastionrpm.com',
//                GITHUB_CLIENT_ID,
//                GITHUB_CLIENT_SECRET
//            );
//                        
//            if ($otp) {
//                $authCommand->setOtp($otp);
//            }
//            $authResult = $authCommand->execute();

            
            var_dump($authResult);
            
//            $currentAuth = $currentAuths->findNoteAuthorization($applicationName);
//
//            if ($currentAuth) {
//                echo "Already have current auth: ".$currentAuth->token.PHP_EOL;
//                $token = $currentAuth->token;
//                break;
//            }
//
//            $createAuthToken = $githubService->createAuthToken(
//                $basicToken,
//                [],
//                $applicationName,
//                'https://www.bastionrpm.com'
//            );
//
//            if ($otp) {
//                $createAuthToken->setOtp($otp);
//            }
//
//            $authResult = $createAuthToken->execute();
//
//            var_dump($authResult);

            echo "Token is ".$authResult->token;
            $token = $authResult->token;
            $i = 5;
        }
        catch (OneTimePasswordAppException $otpae) {
            echo "Please enter the code from your 2nd factor auth app:\n";
            $otp = trim(fgets(STDIN));

        }
        catch (OneTimePasswordSMSException $otse) {
            echo "Please enter the code from the SMS Github should have sent you:\n";
            $otp = trim(fgets(STDIN));
        }
    }
    
    return $token;
}



