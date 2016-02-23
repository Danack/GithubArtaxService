<?php 

namespace GithubService\Model;

class Links
{
    /**
     * @var \GithubService\Model\Comments $html
     */
    public $html = null;

    /**
     * @var \GithubService\Model\Comments $pullRequest
     */
    public $pullRequest = null;

    /**
     * @var \GithubService\Model\Comments $self
     */
    public $self = null;

    protected function getDataMap() {
        $dataMap = [
            ['html', 'html', 'class' => 'GithubService\\Model\\Comments'],
            ['pullRequest', 'pull_request', 'class' => 'GithubService\\Model\\Comments'],
            ['self', 'self', 'class' => 'GithubService\\Model\\Comments'],
        ];

        return $dataMap;
    }
}
