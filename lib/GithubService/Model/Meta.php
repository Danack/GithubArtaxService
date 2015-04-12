<?php

namespace GithubService\Model;


class Meta {

    use DataMapper;

    public $hookCIDRs = [];
    public $gitCIDRs = [];
    public $verifiablePasswordAuthentication;
    public $githubServicesSHA;
    
    static protected $dataMap = array(
        ['hookCIDRs', 'hooks', 'multiple' => true, ],
        ['gitCIDRs', 'git', 'multiple' => true, ],
        ['verifiablePasswordAuthentication', 'verifiable_password_authentication', ],
        ['githubServicesSHA', 'github_services_sha', ],
    );
}
