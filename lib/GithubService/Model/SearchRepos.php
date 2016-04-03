<?php

namespace GithubService\Model;

class SearchRepos
{
    use GithubTrait;
    use SafeAccess;
    
    public $totalCount = null;

    public $incompleteResults = null;

    /** @var SearchRepoItem[] */
    public $repoList = [];
}
