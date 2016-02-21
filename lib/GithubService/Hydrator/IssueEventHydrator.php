<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\IssueEvent;


class IssueEventHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $issueEvent = new IssueEvent();
        $issueEvent->commitId = $dataMapper->extractValue($data, 'commit_id');
        $issueEvent->createdAt = $dataMapper->extractValue($data, 'created_at');
        $issueEvent->event = $dataMapper->extractValue($data, 'event');
        $issueEvent->id = $dataMapper->extractValue($data, 'id');
        $issueEvent->url = $dataMapper->extractValue($data, 'url');
        $user = $dataMapper->extractValue($data, 'actor');
        $issueEvent->actor = $dataMapper->instantiate('GithubService\Model\User', $user);

        return $issueEvent;
    }
}
