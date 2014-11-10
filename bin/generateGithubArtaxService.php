<?php

$autoloader = require_once(__DIR__.'/../vendor/autoload.php');

$outputDirectory = realpath(__DIR__).'/../lib';

$namespace = 'GithubService';

$autoloader->add($namespace, [$outputDirectory]);

$constructorParams = ['userAgent'];

$apiGenerator = new \ArtaxServiceBuilder\APIGenerator(
    $outputDirectory,
    $constructorParams
);

$apiGenerator->addAPIParameter('userAgent');

$apiGenerator->addParameterTranslation([
    'User-Agent' => 'userAgent',
]);

$apiGenerator->excludeMethods(['defaultGetOperation', 'defaultGetOauthOperation']);
$apiGenerator->parseAndAddServiceFromFile(__DIR__.'/../description/githubServiceDescription.php');

$operations = $apiGenerator->parseServiceFile(
    __DIR__.'/../description/githubServiceDescription.php'
);

$apiGenerator->addPaginationMethods(".*", 'genericPaginate');




$apiGenerator->addInterface($namespace.'\GithubService');
$apiGenerator->setFQCN($namespace.'\GithubArtaxService\GithubArtaxService');
$apiGenerator->setOperationNamespace($namespace.'\Operation');
$apiGenerator->generate();
$apiGenerator->generateInterface($namespace.'\GithubService');

