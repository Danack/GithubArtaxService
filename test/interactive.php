<?php

use Auryn\Provider;
use GithubService\GithubService;
use ArtaxServiceBuilder\BasicAuthToken;

use GithubService\OneTimePasswordAppException;
use GithubService\OneTimePasswordSMSException;

$autoloader = require __DIR__.'/../vendor/autoload.php';

require_once "testBootstrap.php";


/** @var  $injector Provider */
$injector = createProvider();

/** @var $githubService GithubService */
$githubService = $injector->make('GithubService\GithubArtaxService\GithubService');

echo "Enter username:\n";
$username = trim(fgets(STDIN));


echo "Enter password:\n";
$password = trim(fgets(STDIN));

$otp = false;
$token = false;

$basicToken = new BasicAuthToken($username, $password);

$applicationName = 'BastionInteractiveTest';

for ($i=0; $i<5 && ($token == false) ; $i++) {

    try {

        $currentAuthCommand = $githubService->listAuthorizations($basicToken);

        if ($otp) {
            $currentAuthCommand->setOtp($otp);
        }

        $currentAuths = $currentAuthCommand->execute();
        $currentAuth = $currentAuths->findNoteAuthorization($applicationName);
        
        if ($currentAuth) {
            echo "Already have current auth: ".$currentAuth->token;
            break;
        }

        $createAuthToken = $githubService->createAuthToken(
            $basicToken,
            [],
            $applicationName,
            'https://www.bastionrpm.com'
        );

        if ($otp) {
            $createAuthToken->setOtp($otp);
        }
        
        $authResult = $createAuthToken->execute();
        
        var_dump($authResult);
        

//        echo "Token is ".$authResult->token;
//        $token = $authResult->token;
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


echo "Complete.";




