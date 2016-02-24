<?php 

namespace GithubService\Model;

class UserEmail
{
    use GithubTrait;
    use SafeAccess;
    
    public $email = null;

    public $primary = null;

    public $verified = null;
}
