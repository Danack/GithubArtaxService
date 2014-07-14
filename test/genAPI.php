<?php

use ArtaxServiceBuilder\OperationDefinition;
use ArtaxServiceBuilder\APIGenerator;

$autoloader = require_once(__DIR__ . '/../vendor/autoload.php');

$outputDirectory = realpath(__DIR__).'/../var/src';
$autoloader->add('AABTest', [$outputDirectory]);


/*
$apiGenerator->excludeMethods(['defaultGetOperation']);
$apiGenerator->parseAndAddServiceFromFile(__DIR__.'/fixtures/flickrService.php');
$apiGenerator->addInterface('AABTest\FlickrAPI');
$apiGenerator->setFQCN('AABTest\FlickrAPI\FlickrAPI');
$apiGenerator->generate();
$apiGenerator->generateInterface('AABTest\FlickrAPI');
*/

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


$apiGenerator->excludeMethods(['defaultGetOperation']);
$apiGenerator->parseAndAddServiceFromFile(__DIR__.'/fixtures/githubService.php');
$apiGenerator->addInterface('AABTest\GithubAPI');
$apiGenerator->setFQCN('AABTest\GithubAPI\GithubAPI');
$apiGenerator->generate();
$apiGenerator->generateInterface('AABTest\GithubAPI');

