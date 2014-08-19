<?php

use Auryn\Provider;

error_reporting(E_ALL);

$autoloader = require __DIR__.'/../vendor/autoload.php';
$classDir = realpath(__DIR__)."/fixtures/";
$outputDirectory = realpath(__DIR__).'/../var/src';

$autoloader->add('AABTest', [$classDir, $outputDirectory]);
$autoloader->add('ArtaxServiceBuilder', [realpath(__DIR__)."/"]);

$included = include_once "../../flickrKey.php";


if (defined('FLICKR_KEY') == false) {
    echo "To run the Flickr tests you must define a Flickr API key to use.";
    define('FLICKR_KEY', 12345);
}

if (defined('FLICKR_SECRET') == false) {
    echo "To run the Flickr oauth tests you must define a Flickr API key to use.";
    define('FLICKR_SECRET', 54321);
}


function prepareArtaxClient(Artax\Client $client, Auryn\AurynInjector $provider) {
    $client->setOption(\Artax\Client::OP_MS_CONNECT_TIMEOUT, 25);
}



/**
 * @param array $implementations
 * @param array $shareClasses
 * @return Provider
 */
function createProvider($implementations = array(), $shareClasses = array()) {


    $provider = new Provider();

    $provider->define(
        'GithubService\GithubArtaxService\GithubArtaxService',
        [':userAgent' => 'Danack_test']
    );

//    $redisParameters = array(
//        'connection_timeout' => 30,
//        'read_write_timeout' => 30,
//    );


    //$provider->delegate('Artax\Client', 'createArtaxClient');
//    $redisOptions = [];
//
//    //This next line annoys phpstorm
//    $provider->define(
//        'Predis\Client',
//        array(
//            ':parameters' => $redisParameters,
//            ':options' => $redisOptions,
//        )
//    );

    $provider->prepare('Artax\Client', 'prepareArtaxClient');

    $standardImplementations = [
//        'Intahwebz\ObjectCache' => 'Intahwebz\Cache\InMemoryCache',
//        'Psr\Log\LoggerInterface' => $standardLogger
        'GithubService\GithubService' => 'DebugGithub',
//        $provider->alias('GithubService\GithubService', 'GithubService\GithubArtaxService\GithubArtaxService');

        //These are default
        'Artax\AsyncClient'     => 'Artax\AsyncClient',
        //'Addr\ResultCache'      => 'Addr\ResultCache',
        'Alert\Reactor'         => 'Alert\NativeReactor',
        'Artax\AddrDnsResolver' => 'Artax\AddrDnsResolver',

        //Non-standard
        'PSR\Cache'     => 'PSR\Cache\APCCache',
        'Addr\Cache'    => 'Addr\MemoryCache'
    ];

    $standardShares = [
//        'Intahwebz\Timer' => 'Intahwebz\Timer',
//        'Monolog\Logger' => $standardLogger,
        'Alert\Reactor' => 'Alert\Reactor'
    ];

    foreach ($standardImplementations as $interface => $implementation) {
        if (array_key_exists($interface, $implementations)) {
            if (is_object($implementations[$interface]) == true) {
                $provider->alias($interface, get_class($implementations[$interface]));
                $provider->share($implementations[$interface]);
            }
            else {
                $provider->alias($interface, $implementations[$interface]);
            }
            unset($implementations[$interface]);
        }
        else {
            if (is_object($implementation)) {
                $implementation = get_class($implementation);
            }
            $provider->alias($interface, $implementation);
        }
    }

    foreach ($implementations as $class => $implementation) {
        if (is_object($implementation) == true) {
            $provider->alias($class, get_class($implementation));
            $provider->share($implementation);
        }
        else {
            $provider->alias($class, $implementation);
        }
    }

    foreach ($standardShares as $class => $share) {
        if (array_key_exists($class, $shareClasses)) {
            $provider->share($shareClasses[$class]);
            unset($shareClasses[$class]);
        }
        else {
            $provider->share($share);
        }
    }

    foreach ($shareClasses as $class => $share) {
        $provider->share($share);
    }

    $provider->share($provider); //YOLO

    return $provider;
}
 
