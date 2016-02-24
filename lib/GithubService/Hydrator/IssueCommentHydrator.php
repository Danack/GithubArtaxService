<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\IssueComment;


class IssueCommentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $issueComment = new IssueComment();
        $issueComment->body = $hydratorRegistry->extractValue($data, 'body');
        $issueComment->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $issueComment->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $issueComment->id = $hydratorRegistry->extractValue($data, 'id');
        $issueComment->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $issueComment->url = $hydratorRegistry->extractValue($data, 'url');
        $user = $hydratorRegistry->extractValue($data, 'user');
        $issueComment->user = $hydratorRegistry->instantiateClass('GithubService\Model\User', $user);

        return $issueComment;
    }
}
