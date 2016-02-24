<?php

namespace GithubService\Hydrator;

use GithubService\Hydrator;
use GithubService\HydratorRegistry;
use GithubService\Model\GistComment;

class GistCommentHydrator implements Hydrator
{
    public function hydrate(array $data, HydratorRegistry $hydratorRegistry)
    {
        $gistComment = new GistComment();

        $gistComment->body = $hydratorRegistry->extractValue($data, 'body');
        $gistComment->createdAt = $hydratorRegistry->extractValue($data, 'created_at');
        $gistComment->id = $hydratorRegistry->extractValue($data, 'id');
        $gistComment->updatedAt = $hydratorRegistry->extractValue($data, 'updated_at');
        $gistComment->url= $hydratorRegistry->extractValue($data, 'url');
  
        $user = $hydratorRegistry->extractValue($data, 'user');
        $gistComment->user = $hydratorRegistry->instantiateClass('GithubService\Model\User', $user);

        return $gistComment;
    }
}
