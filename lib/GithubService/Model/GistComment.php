<?php 

namespace GithubService\Model;

class GistComment
{
    public $body = null;

    public $createdAt = null;

    public $id = null;

    public $updatedAt = null;

    public $url = null;

    /**
     * @var \GithubService\Model\User $user
     */
    public $user = null;
}
