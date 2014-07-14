<?php

use ArtaxServiceBuilder\OperationDefinition;
use ArtaxServiceBuilder\APIGenerator;

$autoloader = require_once(__DIR__ . '/../vendor/autoload.php');

$outputDirectory = realpath(__DIR__).'/../var/src';

$namespace = 'GithubService';

$autoloader->add($namespace, [$outputDirectory]);



$constructorParams = ['userAgent'];

//Start of github
$apiGenerator = new \ArtaxServiceBuilder\APIGenerator(
    $outputDirectory,
    $constructorParams
);

$apiGenerator->addAPIParameter('userAgent');

$apiGenerator->addParameterTranslation([
    'User-Agent' => 'userAgent',
]);

$apiGenerator->excludeMethods(['defaultGetOperation', 'defaultGetOauthOperation']);
$apiGenerator->parseAndAddServiceFromFile(__DIR__.'/githubService.php');
$apiGenerator->addInterface($namespace.'\GithubAPI');
$apiGenerator->setFQCN($namespace.'\GithubAPI\GithubAPI');
$apiGenerator->generate();
$apiGenerator->generateInterface($namespace.'\GithubAPI');

