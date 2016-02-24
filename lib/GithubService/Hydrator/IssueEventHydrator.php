<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\IssueEvent;


class IssueEventHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $issueEvent = new IssueEvent();
        $issueEvent->commitId = $hydratorRegistry->extractValue($data, 'commit_id');
        $issueEvent->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $issueEvent->event = $hydratorRegistry->extractValue($data, 'event');
        $issueEvent->id = $hydratorRegistry->extractValue($data, 'id');
        $issueEvent->url = $hydratorRegistry->extractValue($data, 'url');
        $user = $hydratorRegistry->extractValue($data, 'actor');
        $issueEvent->actor = $hydratorRegistry->instantiateClass('GithubService\Model\User', $user);

        return $issueEvent;
    }
}
