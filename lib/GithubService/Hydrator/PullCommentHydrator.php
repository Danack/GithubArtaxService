<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\PullComment;



class PullCommentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $pullComment = new PullComment();
        $pullComment->body = $dataMapper->extractValue($data, 'body');
        $pullComment->commitId = $dataMapper->extractValue($data, 'commit_id');
        $pullComment->createdAt = $dataMapper->extractValue($data, 'created_at');
        $pullComment->diffHunk = $dataMapper->extractValue($data, 'diff_hunk');
        $pullComment->html_url = $dataMapper->extractValue($data, 'html_url');
        $pullComment->id = $dataMapper->extractValue($data, 'id');
        $pullComment->originalCommitId = $dataMapper->extractValue($data, 'original_commit_id');
        $pullComment->originalPosition = $dataMapper->extractValue($data, 'original_position');
        $pullComment->path = $dataMapper->extractValue($data, 'path');
        $pullComment->position = $dataMapper->extractValue($data, 'position');
        $pullComment->pullRequestUrl = $dataMapper->extractValue($data, 'pull_request_url');
        $pullComment->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $pullComment->url = $dataMapper->extractValue($data, 'url');
        $user = $dataMapper->extractValue($data, 'user');
        $pullComment->user = $dataMapper->instantiate('GithubService\Model\User', $user);

        //TODO restore links
            //['links', '_links', 'class' => 'GithubService\\Model\\Links'],


        return $pullComment;
    }
}
