<?php 

namespace GithubService\Model;

class Enterprise
{
    public $adminPassword = null;

    /**
     * @var \GithubService\Model\ $assets
     */
    public $assets = null;

    public $authMode = null;

    /**
     * @var \GithubService\Model\ $avatar
     */
    public $avatar = null;

    /**
     * @var \GithubService\Model\ $cas
     */
    public $cas = null;

    /**
     * @var \GithubService\Model\ $collectd
     */
    public $collectd = null;

    public $configurationId = null;

    public $configurationRunCount = null;

    /**
     * @var \GithubService\Model\ $customer
     */
    public $customer = null;

    /**
     * @var \GithubService\Model\ $device
     */
    public $device = null;

    /**
     * @var \GithubService\Model\ $dns
     */
    public $dns = null;

    public $githubHostname = null;

    /**
     * @var \GithubService\Model\ $githubOauth
     */
    public $githubOauth = null;

    /**
     * @var \GithubService\Model\ $githubSsl
     */
    public $githubSsl = null;

    /**
     * @var \GithubService\Model\ $ldap
     */
    public $ldap = null;

    /**
     * @var \GithubService\Model\ $license
     */
    public $license = null;

    /**
     * @var \GithubService\Model\ $ntp
     */
    public $ntp = null;

    public $packageVersion = null;

    /**
     * @var \GithubService\Model\ $pages
     */
    public $pages = null;

    public $privateMode = null;

    /**
     * @var \GithubService\Model\ $rsyslog
     */
    public $rsyslog = null;

    /**
     * @var \GithubService\Model\ $smtp
     */
    public $smtp = null;

    /**
     * @var \GithubService\Model\ $snmp
     */
    public $snmp = null;

    public $storageMode = null;

    /**
     * @var \GithubService\Model\ $timezone
     */
    public $timezone = null;

    protected function getDataMap() {
        $dataMap = [
            ['adminPassword', 'admin_password'],
            ['assets', 'assets', 'class' => 'GithubService\\Model\\Assets'],
            ['authMode', 'auth_mode'],
            ['avatar', 'avatar', 'class' => 'GithubService\\Model\\Avatar'],
            ['cas', 'cas', 'class' => 'GithubService\\Model\\Cas'],
            ['collectd', 'collectd', 'class' => 'GithubService\\Model\\Collectd'],
            ['configurationId', 'configuration_id'],
            ['configurationRunCount', 'configuration_run_count'],
            ['customer', 'customer', 'class' => 'GithubService\\Model\\Customer'],
            ['device', 'device', 'class' => 'GithubService\\Model\\Device'],
            ['dns', 'dns', 'class' => 'GithubService\\Model\\Dns'],
            ['githubHostname', 'github_hostname'],
            ['githubOauth', 'github_oauth', 'class' => 'GithubService\\Model\\GithubOauth'],
            ['githubSsl', 'github_ssl', 'class' => 'GithubService\\Model\\GithubSsl'],
            ['ldap', 'ldap', 'class' => 'GithubService\\Model\\Ldap'],
            ['license', 'license', 'class' => 'GithubService\\Model\\License'],
            ['ntp', 'ntp', 'class' => 'GithubService\\Model\\Ntp'],
            ['packageVersion', 'package_version'],
            ['pages', 'pages', 'class' => 'GithubService\\Model\\Pages'],
            ['privateMode', 'private_mode'],
            ['rsyslog', 'rsyslog', 'class' => 'GithubService\\Model\\Rsyslog'],
            ['smtp', 'smtp', 'class' => 'GithubService\\Model\\Smtp'],
            ['snmp', 'snmp', 'class' => 'GithubService\\Model\\Snmp'],
            ['storageMode', 'storage_mode'],
            ['timezone', 'timezone', 'class' => 'GithubService\\Model\\Timezone'],
        ];

        return $dataMap;
    }
}
