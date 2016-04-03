<?php

use Tier\InjectionParams;

// These classes will only be created once by the injector.
$shares = [
    'Alert\Reactor',
    'ASM\Session',
    'Jig\JigRender',
    'Jig\Jig',
    'Jig\JigConverter',
    'ScriptHelper\ScriptInclude',
    'ScriptHelper\ScriptVersion',
    'Room11\HTTP\VariableMap',
    'Room11\HTTP\HeadersSet',
    'Psr\Http\Message\ServerRequestInterface',
    new \ASM\File\SessionFilePath(__DIR__."/../var/session/"),
    new \Jig\JigTemplatePath(__DIR__."/../example/templates/"),
    new \Jig\JigCompilePath(__DIR__."/../var/compile/"),
    new \Tier\Path\AutogenPath(__DIR__.'/../autogen/'),
    new \Tier\Path\CachePath(__DIR__.'/../var/cache/'),
    new \Tier\Path\ExternalLibPath(__DIR__.'/../lib/'),
    new \Tier\Path\WebRootPath(__DIR__.'/../public/'),
    new \ArtaxServiceBuilder\ResponseCache\FileCachePath(__DIR__."/./var/cache/"),

];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
$aliases = [
    //'GithubService\GithubService' => 'DebugGithub',
    'GithubService\GithubService' => 'GithubService\GithubArtaxService\GithubService',
    'ArtaxServiceBuilder\ResponseCache' => 'ArtaxServiceBuilder\ResponseCache\NullResponseCache',
    'ASM\Driver' => 'ASM\File\FileDriver',
    'Jig\Escaper' => 'Jig\Bridge\ZendEscaperBridge',
    'PSR\Cache'     => 'PSR\Cache\APCCache',
    'Room11\HTTP\VariableMap' => 'Room11\HTTP\VariableMap\PSR7VariableMap',
    'Room11\HTTP\RequestHeaders' => 'Room11\HTTP\Request\HTTPRequestHeaders',
    'ScriptHelper\FilePacker' => 'ScriptHelper\FilePacker\YuiFilePacker',
    'ScriptHelper\ScriptURLGenerator' => 'ScriptHelper\ScriptURLGenerator\StandardScriptURLGenerator',
    'ScriptHelper\ScriptVersion' => 'ScriptHelper\ScriptVersion\DateScriptVersion',
    'TierJigSkeleton\Repository\UserRepo' => 'TierJigSkeleton\Repository\Stub\UserStubRepo',
    'Zend\Diactoros\Response\EmitterInterface' => 'Zend\Diactoros\Response\SapiEmitter',
];


function createReactor()
{
    return Amp\reactor();
}

// Delegate the creation of types to callables.
$delegates = [
    'Amp\Reactor' => 'createReactor',
    'ASM\Session' => ['GithubExample\App', 'createSession'],
    'Jig\JigConfig' => ['GithubExample\App', 'createJigConfig'],
    'ScriptHelper\ScriptInclude' => ['GithubExample\App', 'createScriptInclude'],
    'FastRoute\Dispatcher' => ['GithubExample\App', 'createDispatcher'],
    //'GithubService\AuthToken' => 'GithubExample\SessionBasedOauth::loadOauth'
];


// Define some params that can be injected purely by name.
$params = [];

$prepares = [
    'Jig\Jig' =>  ['GithubExample\App', 'prepareJig'],
    'Artax\Client' => ['GithubExample\App', 'prepareArtaxClient'],
];

$defines = [
    'GithubService\GithubArtaxService\GithubArtaxService' => [':userAgent' => 'GithubArtaxService']
];

$injectionParams = new InjectionParams(
    $shares,
    $aliases,
    $delegates,
    $params,
    $prepares,
    $defines
);

return $injectionParams;
