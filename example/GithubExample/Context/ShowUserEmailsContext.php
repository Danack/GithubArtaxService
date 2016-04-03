<?php


namespace GithubExample\Context;

use GithubService\Model\UserEmail;

class ShowUserEmailsContext
{
    public $userEmails;
    
    private function __construct()
    {
    }

    public static function fromUserEmails(UserEmail $userEmail)
    {
        $instance = new self();
        $instance->userEmails = $userEmail;

        return $instance;
    }
}
