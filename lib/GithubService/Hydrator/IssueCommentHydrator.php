<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\DataMapper;
use GithubService\Model\IssueComment;


class IssueCommentHydrator implements Hydrator
{
    public function hydrate(array $data, DataMapper $dataMapper)
    {
        $issueComment = new IssueComment();
        $issueComment->body = $dataMapper->extractValue($data, 'body');
        $issueComment->createdAt = $dataMapper->extractValue($data, 'created_at');
        $issueComment->htmlUrl = $dataMapper->extractValue($data, 'html_url');
        $issueComment->id = $dataMapper->extractValue($data, 'id');
        $issueComment->updatedAt = $dataMapper->extractValue($data, 'updated_at');
        $issueComment->url = $dataMapper->extractValue($data, 'url');
        $user = $dataMapper->extractValue($data, 'user');
        $issueComment->user = $dataMapper->instantiate('GithubService\Model\User', $user);

        return $issueComment;
    }
}
