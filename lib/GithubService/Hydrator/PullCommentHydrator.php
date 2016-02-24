<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\PullComment;

class PullCommentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $pullComment = new PullComment();
        $pullComment->body = $hydratorRegistry->extractValue($data, 'body');
        $pullComment->commitId = $hydratorRegistry->extractValue($data, 'commit_id');
        $pullComment->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $pullComment->diffHunk = $hydratorRegistry->extractValue($data, 'diff_hunk');
        $pullComment->htmlUrl = $hydratorRegistry->extractValue($data, 'html_url');
        $pullComment->id = $hydratorRegistry->extractValue($data, 'id');
        $pullComment->originalCommitId = $hydratorRegistry->extractValue($data, 'original_commit_id');
        $pullComment->originalPosition = $hydratorRegistry->extractValue($data, 'original_position');
        $pullComment->path = $hydratorRegistry->extractValue($data, 'path');
        $pullComment->position = $hydratorRegistry->extractValue($data, 'position');
        $pullComment->pullRequestUrl = $hydratorRegistry->extractValue($data, 'pull_request_url');
        $pullComment->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $pullComment->url = $hydratorRegistry->extractValue($data, 'url');
        $user = $hydratorRegistry->extractValue($data, 'user');
        $pullComment->user = $hydratorRegistry->instantiateClass('GithubService\Model\User', $user);

        //TODO restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],


        return $pullComment;
    }
}
