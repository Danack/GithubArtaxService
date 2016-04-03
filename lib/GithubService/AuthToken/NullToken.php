<?php

namespace GithubService\AuthToken;

use GithubService\AuthToken;

class NullToken implements AuthToken 
{
    public function getToken()
    {
        return null;
    }
}
