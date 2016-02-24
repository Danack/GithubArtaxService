<?php 

namespace GithubService\Model;

class RepoStatsCodeFrequency
{
    use GithubTrait;
    use SafeAccess;

    /**
     * @var \GithubService\Model\Indices $rEPOSTATSCODEFREQUENCYChild
     */
    public $repoStats = [];
}
