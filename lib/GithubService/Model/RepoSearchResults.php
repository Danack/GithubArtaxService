<?php 

namespace GithubService\Model;

class RepoSearchResults 
{
    use GithubTrait;
    use SafeAccess;
    
    /**
     * @var \GithubService\Model\ $repositories
     */
    public $repositories = null;
}
