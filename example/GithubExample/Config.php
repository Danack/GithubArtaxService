<?php

namespace GithubExample;

use Tier\TierException;

class Config
{
    const GITHUB_ACCESS_TOKEN = 'github_access_token';
    const GITHUB_REPO_NAME = 'github_repo_name';
    
    //Server container
    const AWS_SERVICES_KEY = 'aws_services_key';
    const AWS_SERVICES_SECRET = 'aws_services_secret';

    const JIG_COMPILE_CHECK = 'jig_compilecheck';

    const CACHING_SETTING = 'caching_setting';
    
    const SCRIPT_VERSION = 'script_version';
    const SCRIPT_PACKING = 'script_packing';

    private $values = [];

    /**
     *
     */
    public function __construct()
    {
        $this->values = [];
        $this->values = array_merge($this->values, getAppEnv());
        if (function_exists('getAppKeys')) {
            $this->values = array_merge($this->values, getAppKeys());
        }
    }

    /**
     * @param $key
     * @return mixed
     * @throws TierException
     */
    public function getKey($key)
    {
        if (array_key_exists($key, $this->values) == false) {
            throw new TierException("Missing config value of $key");
        }

        return $this->values[$key];
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function getKeyWithDefault($key, $default)
    {
        if (array_key_exists($key, $this->values) === false) {
            return $default;
        }

        return $this->values[$key];
    }
}
