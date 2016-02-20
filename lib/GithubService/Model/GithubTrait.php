<?php


namespace GithubService\Model;

trait GithubTrait
{
    /**
     * @var  \ArtaxServiceBuilder\Service\GithubPaginator|null
     */
    public $pager;

    /**
     * @var
     */
    public $oauthScopes = null;
}
