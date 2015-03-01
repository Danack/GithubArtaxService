<?php

use Auryn\Provider;

error_reporting(E_ALL);

$autoloader = require __DIR__.'/../vendor/autoload.php';
$classDir = realpath(__DIR__)."/fixtures/";
$autoloader->add('ArtaxServiceBuilder', [realpath(__DIR__)."/"]);

function createClient(Amp\Reactor $reactor) {
    $client = new Amp\Artax\Client($reactor);

    return $client;
}

function prepareArtaxClient(Amp\Artax\Client $client) {
    $client->setOption(\Amp\Artax\Client::OP_MS_CONNECT_TIMEOUT, 5000);
    $client->setOption(\Amp\Artax\Client::OP_MS_KEEP_ALIVE_TIMEOUT, 2000);
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
    
    $provider->prepare('Amp\Artax\Client', 'prepareArtaxClient');

    $standardImplementations = [
        'GithubService\GithubService' => 'DebugGithub',
        'Amp\Artax\AsyncClient'     => 'Amp\Artax\AsyncClient',
        'Amp\Reactor'               => 'Amp\NativeReactor',
        'ArtaxServiceBuilder\ResponseCache' => 'ArtaxServiceBuilder\ResponseCache\NullResponseCache',
        'PSR\Cache'     => 'PSR\Cache\APCCache',
        'Amp\Addr\Cache'    => 'Amp\Addr\MemoryCache'
    ];

    $standardShares = [
        'Amp\Reactor' => 'Amp\Reactor'
    ];
    
    $provider->delegate('Amp\Artax\Client', 'createClient');

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
 
