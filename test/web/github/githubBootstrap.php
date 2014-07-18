<?php



define('SERVER_HOSTNAME', 'localhost:8000');
define('SESSION_NAME', 'githubTest');
define('GITHUB_ACCESS_RESPONSE_KEY', 'githubAccess');

$autoloader = require __DIR__.'/../../../vendor/autoload.php';
$outputDirectory = realpath(__DIR__).'/../../../var/src';

$autoloader->add('GithubService', [$outputDirectory]);

require "webFunctions.php";
require "githubFunctions.php";

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

session_name(SESSION_NAME);
session_start();

