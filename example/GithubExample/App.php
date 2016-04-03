<?php

namespace GithubExample;


use Amp\Artax\Client as ArtaxClient;
use Auryn\Injector;
use ASM\Session;
use ASM\SessionConfig;
use ASM\SessionManager;
use GithubService\AuthToken;
use FastRoute\Dispatcher;
use GithubExample\Config;
use Jig\Jig;
use Jig\JigConfig;
use Predis\Client as RedisClient;
use Room11\HTTP\Response;
use Room11\Caching\LastModifiedStrategy;
use Room11\HTTP\HeadersSet;
use Tier\InjectionParams;
use Tier\TierApp;
use Tier\TierException;
use GithubService\AuthToken\Oauth2Token;
use GithubExample\Context\OauthContext;
use GithubService\AuthToken\NullToken;
use GithubExample\Route;




class App
{
    /**
     * @return JigConfig
     */
    public static function createJigConfig(
        Config $config,
        \Jig\JigTemplatePath $templatePath,
        \Jig\JigCompilePath $compilePath
    ) {
        $jigConfig = new JigConfig(
            $templatePath,
            $compilePath,
            $config->getKey(Config::JIG_COMPILE_CHECK),
            'tpl'
        );

        return $jigConfig;
    }

    public static function authorizedRoutesFunction(\FastRoute\RouteCollector $r)
    {
        

        self::commonRoutesFunction($r);
        
        $r->addRoute('GET', Route::showEmails(), 'GithubExample\Controller\Controller::showEmails');
        
        $r->addRoute('GET', Route::showAddEmailForm(), 'GithubExample\Controller\Controller::showAddEmailForm');
        $r->addRoute('POST', Route::processAddEmailForm(), 'GithubExample\Controller\Controller::processAddEmailForm');

        $r->addRoute('GET', Route::showRepoTags(), 'GithubExample\Controller\Controller::showRepoTags');
        $r->addRoute('GET', Route::showMultiRepoTags(), 'GithubExample\Controller\Controller::showMultiRepoTags');
        $r->addRoute('GET', Route::listRepoCommits(), 'GithubExample\Controller\Controller::listRepoCommits');
        $r->addRoute('GET', Route::listRepoCommitsPages(), 'GithubExample\Controller\Controller::listRepoCommitsPages');
        $r->addRoute('GET', Route::listRepoCommitsIterator(), 'GithubExample\Controller\Controller::listRepoCommitsIterator');
        $r->addRoute('GET', Route::showAuthorizations(), 'GithubExample\Controller\Controller::showAuthorizations');
        $r->addRoute('GET', Route::showUser(), 'GithubExample\Controller\Controller::showUser');
        $r->addRoute('GET', Route::oauthForget(), 'GithubExample\Controller\Controller::forget');
        $r->addRoute('GET', Route::oauthrevoke(), 'GithubExample\Controller\Controller::revoke');
    }
    
    public static function commonRoutesFunction(\FastRoute\RouteCollector $r)
    {
        $r->addRoute('GET', '/', 'GithubExample\Controller\Controller::index');
        $r->addRoute('GET', '/debug', 'GithubExample\Controller\Controller::debug');
        $r->addRoute('GET', Route::showRepoTags(), 'GithubExample\Controller\Controller::showRepoTags');
        $r->addRoute('GET', Route::showUser(), 'GithubExample\Controller\Controller::showUser');
    }
    
    public static function notAuthorizedRoutesFunction(\FastRoute\RouteCollector $r)
    {
        $r->addRoute('GET', Route::oauthStart(), 'GithubExample\Controller\Controller::oauthStart');
        $r->addRoute('GET', Route::oauthConfirm(), 'GithubExample\Controller\Controller::oauthConfirm');
        $r->addRoute('GET', Route::oauthReturn(), 'GithubExample\Controller\Controller::oauthReturn');

        self::commonRoutesFunction($r);
    }

    /**
     * @param Jig $jig
     * @param $injector
     */
    public static function prepareJig(Jig $jig, $injector)
    {
        // This is where default plugins are added.
        $jig->addDefaultPlugin('GithubExample\GithubPlugin');
    }

    /**
     * @return RedisClient
     */
    public static function createRedisClient()
    {
        $redisParameters = array(
            "scheme" => "tcp",
            "host" => '127.0.0.1',
            "port" => 6379
        );

        $redisOptions = array(
            'profile' => '2.6'
        );

        $redisClient = new RedisClient($redisParameters, $redisOptions);

        return $redisClient;
    }

    /**
     * @param \ASM\Driver $driver
     * @return Session
     */
    public static function createSession(\ASM\Driver $driver)
    {
        $sessionConfig = new SessionConfig(
            'SessionTest',
            1000,
            10
        );

        $sessionManager = new SessionManager(
            $sessionConfig,
            $driver
        );

        $session = $sessionManager->createSession($_COOKIE);

        return $session;
    }


    public static function createCaching(Config $config)
    {
        $cacheSetting = $config->getKey(Config::CACHING_SETTING);

        switch ($cacheSetting) {
            case LastModifiedStrategy::CACHING_DISABLED: {
                return new \Room11\Caching\LastModified\Disabled();
            }
            case LastModifiedStrategy::CACHING_REVALIDATE: {
                return new \Room11\Caching\LastModified\Revalidate(3600 * 2, 3600);
            }
            case LastModifiedStrategy::CACHING_TIME: {
                return new \Room11\Caching\LastModified\Time(3600 * 10, 3600);
            }
            default: {
                throw new TierException("Unknown caching setting '$cacheSetting'.");
            }
        }
    }

    public static function createScriptInclude(
        Config $config,
        \ScriptHelper\ScriptURLGenerator $scriptURLGenerator
    ) {
        $packScript = $config->getKey(Config::SCRIPT_PACKING);

        if ($packScript) {
            return new \ScriptHelper\ScriptInclude\ScriptIncludePacked($scriptURLGenerator);
        }
        else {
            return new \ScriptHelper\ScriptInclude\ScriptIncludeIndividual($scriptURLGenerator);
        }
    }

    /**
     * @param Session $session
     * @param HeadersSet $headerSet
     * @return int
     */
    public static function addSessionHeader(Session $session, HeadersSet $headerSet)
    {
        $headers = $session->getHeaders(\ASM\SessionManager::CACHE_PRIVATE);
        foreach ($headers as $key => $value) {
            $headerSet->addHeader($key, $value);
        }
        $session->save();
        
        return TierApp::PROCESS_CONTINUE;
    }

    public static function createDispatcher(OauthContext $oauthContext)
    {
        if ($oauthContext->isAuthenticated === true) {
            $dispatcher = \FastRoute\simpleDispatcher(['GithubExample\App', 'authorizedRoutesFunction']);
        }
        else {
            $dispatcher = \FastRoute\simpleDispatcher(['GithubExample\App', 'notAuthorizedRoutesFunction']);
        }

        return $dispatcher;
    }

    public static function createServerRequest()
    {
        $request = \Zend\Diactoros\ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        return $request;
    }

    function prepareArtaxClient(ArtaxClient $client, Injector $provider) {
        $client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 25);
    }

    public static function initialExecutable(Session $session)
    {
        $data = $session->getSessionVariable(GITHUB_ACCESS_RESPONSE_KEY, null);
        $token = new NullToken();
        $oauthContext = new OauthContext(false, $token);
        
        if (strlen($data) > 0) {
            if (strpos($data, 'token ') === 0) {
                $data = substr($data, strlen('token '));
            }
            $token = new Oauth2Token($data);
            $oauthContext = new OauthContext(true, $token);
        }

        $aliases = [];
        $aliases['GithubService\AuthToken'] = get_class($token);
        return new InjectionParams([$oauthContext, $token], $aliases);
    }
}

