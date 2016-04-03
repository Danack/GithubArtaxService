<?php


namespace GithubExample\Context;

use GithubService\Model\User;

class ShowUserContext
{
    public $user;
    
    private function __construct()
    {
    }

    public static function fromUser(User $user)
    {
        $instance = new self();
        $instance->user = $user;

        return $instance;
    }
}
