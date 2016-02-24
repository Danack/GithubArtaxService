<?php 

namespace GithubService\Model;

class CombinedStatus
{
    use GithubTrait;
    use SafeAccess;

    public $commitUrl = null;

    /**
     * @var \GithubService\Model\ $repository
     */
    public $repository = null;

    public $sha = null;

    public $state = null;

    /**
     * @var \GithubService\Model\ $statuses
     */
    public $statuses = null;

    public $totalCount = null;

    public $url = null;

    protected function getDataMap() {
        $dataMap = [
            ['commitUrl', 'commit_url'],
            ['repository', 'repository', 'class' => 'GithubService\\Model\\Repository'],
            ['sha', 'sha'],
            ['state', 'state'],
            ['statuses', 'statuses', 'multiple' => true, 'class' => 'GithubService\\Model\\Status'],
            ['totalCount', 'total_count'],
            ['url', 'url'],
        ];

        return $dataMap;
    }


}
